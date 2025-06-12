'use client';
import { useEffect, useRef, useState } from "react";
export default function EditableContent({contentData='Add Description Here (Optional)'}:Readonly<{contentData:string}>) {
    const [onEdit, setEdit] = useState(false);
    const [content, setContent] = useState(contentData);
    const textAreaRef = useRef<HTMLTextAreaElement>(null);
    const editElemRef = useRef<HTMLDivElement>(null);
    const limit = 300;

    function saveContent() {
        let textArea = textAreaRef.current;
        if (!textArea || textArea.value.length > limit) {
            setEdit(false);
            return
        };

        let value = textArea.value.trim();
        if (value.length == 0) setContent(contentData);
        setEdit(false);
    }
    function handleChange(event: React.ChangeEvent<HTMLTextAreaElement>) {
        // let elem = event.target;
        // if (!elem) return;
        // let value = elem.value.trim();
        // if (value.length > limit) return;
        // setContent(elem.value);
    }

    useEffect(() => {
        const elem = editElemRef.current;
        function handleClickOutside(e: MouseEvent) {
            if (elem && !elem.contains(e.target as Node)) {
                setEdit(false);
            }
        }
        document.addEventListener('click', handleClickOutside);
        return ()=>document.removeEventListener('click', handleClickOutside);
    }, [onEdit])
    // function getLength(event:KeyboardEvent){
    //     let textArea = textAreaRef.current;
    //     if(!textArea) return;
    //     set
    //     console.log(textArea.value.length);
    // }
    return onEdit ?
        (
            <div className="text-slate-600" ref={editElemRef}>
                <textarea name="content" id="content" rows={3} className="block resize-none text-sm font-bold px-2 w-full border border-slate-400">
                </textarea>
                <small className="text-slate-400 text-sm/2 mb-2">{`${content.trim().length}/${limit}`}</small>
                <button disabled={false} onClick={saveContent} className="block bg-green-600 text-slate-100 rounded px-5 cursor-pointer">Save</button>
            </ div>
        ) : (
            <h1 onClick={() => setEdit(true)} className="text-3xl border p-3 mb-1 border-transparent hover:border-slate-400 rounded font-bold">
                {content}
            </h1>
        );
}