'use client';

import { useState } from "react";

// export default function UserProfileCardDescription({ content }: Readonly<{ content: string }>) {
export default function UserProfileCardDescription({ children }: Readonly<{ children: string }>) {
    let slicedContent = children;
    let sliced = false;
    const [isOpen, setOpen] = useState(false);
    if (slicedContent.length > 150) {
        slicedContent = slicedContent.slice(0, 150);
        let arrContent = slicedContent.split(' ');
        slicedContent = arrContent.splice(0, arrContent.length - 2).join(' ');
        sliced = true;
    }
    return (
        <>
            <p className="text-xs text-justify">
                {isOpen ? children+' ' : slicedContent+' '}
                {sliced ?
                    <button onClick={() => setOpen(!isOpen)} className="text-sm/2 font-semibold p-0 m-0 cursor-pointer tracking-wide">{isOpen ? "less" : "...more"}</button>
                    :
                    ''
                }
            </p>
        </>
    );
}