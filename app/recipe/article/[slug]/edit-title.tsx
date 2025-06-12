'use client';
import { FormEvent, FormEventHandler, useEffect, useRef, useState } from "react";
import { text } from "stream/consumers";
export default function EditTitle() {
    const [onEdit, setEdit] = useState(false);
    const [title, setTitle] = useState('Untitled Recipe');
    const textAreaRef = useRef<HTMLTextAreaElement>(null);
    const editElemRef = useRef<HTMLDivElement>(null);
    const [limitLength, setLimitLength] = useState(0);
    const limit = 100;

    function saveTitle(event: FormEvent) {
        let textArea = textAreaRef.current;
        if (!textArea || textArea.value.length > limit) {
            setEdit(false);
            return
        };

        let value = textArea.value.trim();
        if (value.length == 0) setTitle('Untitled Recipe');
        setEdit(false);
    }
    function handleChange(event: React.ChangeEvent<HTMLTextAreaElement>) {
        let elem = event.target;
        if (!elem) return;
        let value = elem.value.trim();
        if (value.length > limit) return;
        setTitle(elem.value);
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
                <label htmlFor="title" className="font-semibold">Title</label>
                <textarea name="title" id="title" onChange={handleChange} value={title} rows={3} className="block resize-none text-xl font-bold px-2 w-full border border-slate-400" ref={textAreaRef}>
                </textarea>
                <small className="text-slate-400 text-sm/2 mb-2">{`${title.trim().length}/${limit}`}</small>
                <button disabled={false} onClick={saveTitle} className="block bg-green-600 text-slate-100 rounded px-5 cursor-pointer">Save</button>
            </ div>
        ) : (
            <h1 onClick={() => setEdit(true)} className="text-3xl border p-3 mb-1 border-transparent hover:border-slate-400 rounded font-bold">
                {title}
            </h1>
        );
}