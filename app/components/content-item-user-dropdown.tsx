'use client';
import DropdownCore from "./dropdown-core";

export default function ContentItemUserDropdown() {
    return (
        <DropdownCore>
            {
                ({ isOpen, dropdownRef, toggle }) => (
                    <div className="relative" ref={dropdownRef}>
                        <button onClick={toggle} className="h-6 text-slate-100 bg-black/30 hover:bg-black/40 active:bg-black/50 cursor-pointer aspect-square rounded-full">
                        <i className="fi fi-rr-menu-dots-vertical text-sm/2"></i>
                        </button>
                        <div className={`${isOpen ? '' : 'hidden'} absolute top-6 right-4 rounded-lg rounded-tr-none overflow-hidden w-40 shadow-lg`}>
                            <button className="text-left px-3 py-1 cursor-pointer text-nowrap backdrop-blur-lg bg-slate-100/40 hover:bg-slate-200/40 active:bg-slate-300/40 w-full text-slate-800">Share</button>
                            <button className="text-left px-3 py-1 cursor-pointer text-nowrap backdrop-blur-lg bg-slate-100/40 hover:bg-slate-200/40 active:bg-slate-300/40 w-full text-red-600">Report</button>
                        </div>
                    </div>
                )
            }
        </DropdownCore>
    );
}