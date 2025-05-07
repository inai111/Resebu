'use client';

import { useEffect, useRef, useState } from "react";

export default function VideoCardDropdown({ link }: Readonly<{ link: string }>) {
    let [toggle, setToggle] = useState(false);
    let [copied, setCopied] = useState(false);
    let [timeout, timeoutSet] = useState<NodeJS.Timeout>();
    const dropdownRef = useRef<HTMLDivElement>(null);
    const reportMenuRef = useRef<HTMLButtonElement>(null);
    useEffect(() => {
        function handleOutsideClick(event: MouseEvent) {
            if (dropdownRef.current && (!dropdownRef.current.contains(event.target as Node))) {
                setToggle(false);
            }
        }
        document.addEventListener('click', handleOutsideClick);
        return () => {
            document.removeEventListener('click', handleOutsideClick)
        }
    });

    function copyTo() {
        navigator.clipboard.writeText(link).then(() => {
            setCopied(true);
            clearTimeout(timeout);
            timeoutSet(setTimeout(() => {
                setCopied(false);
            }, 4000));
        });
    }
    return (
        <div className="relative inline-block" ref={dropdownRef}>
            <button onClick={() => setToggle(!toggle)} className="cursor-pointer flex items-center justify-center w-10 h-10 active:bg-slate-200 rounded-full">
                <i className="fi fi-br-menu-dots-vertical"></i>
            </button>
            <div className={`flex flex-col absolute top-10 right-0 z-10 bg-slate-50 rounded py-1 shadow ${!toggle ? 'hidden' : ''}`}>
                <button onClick={copyTo} className="cursor-pointer min-w-35 text-left px-3 text-sm hover:bg-slate-200 py-1"><i className={`w-10 inline-block fi ${!copied?'fi-rr-copy-alt':'fi-br-check'}`}></i>Copy Link</button>
                <button ref={reportMenuRef} className="cursor-pointer min-w-35 text-left px-3 text-sm hover:bg-slate-200 text-red-700 py-1"><i className="w-10 inline-block fi fi-rr-octagon-exclamation"></i>Report</button>
            </div>
        </div>
    );
}