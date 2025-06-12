'use client';
import { useEffect, useRef, useState } from "react";

export default function ContentEditDescription({ contentData }: Readonly<{ contentData: string }>) {
    const [content, setContent] = useState(contentData);
    const [isEdit, setEdit] = useState(false);
    const textAreaRef = useRef<HTMLTextAreaElement>(null);
    const editElemRef = useRef<HTMLDivElement>(null);
    const limit = 300;

    function handleChange(e:React.ChangeEvent<HTMLTextAreaElement>) { 
        let elem = e.target;
        if(elem){
            let value = elem.value.trim();
            if(value.length>limit) return;
            setContent(elem.value)
        }
    }
    useEffect(() => {
        function handleClickOutside(event: MouseEvent) {
            const elem = editElemRef.current;
            if (elem && !elem.contains(event.target as Node) && isEdit) {
                setEdit(false);
            }
        }
        document.addEventListener('click', handleClickOutside);
        return () => document.removeEventListener('click', handleClickOutside);
    }, [isEdit]);
    return isEdit ?
        (
            <div className="text-slate-600" ref={editElemRef}>
                <textarea name="content" id="content" onChange={handleChange} value={content} rows={4} className="block resize-none text-sm outline-0 rounded p-2 w-full border border-slate-400" ref={textAreaRef}>
                </textarea>
                <small className="text-slate-400 text-sm/2 mb-2">{`${content.trim().length}/${limit}`}</small>
                <button disabled={false} onClick={()=>setEdit(false)} className="block bg-green-600 text-slate-100 rounded px-5 cursor-pointer">Save</button>
            </ div>
        ) : (
            <>
                <p onClick={() => setEdit(true)} className={`text-justify cursor-pointer ${content.trim().length == 0 ? 'text-slate-400' : 'text-slate-500'}`}>
                    {content.trim().length == 0 ? 'Add Description Here (Optional)' : content}
                </p>
            </>
        );
}