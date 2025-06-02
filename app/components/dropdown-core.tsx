'use client';
import { useEffect, useRef, useState } from "react";

type DropdownProps = {
    children: (props: {
        isOpen: boolean,
        toggle: () => void,
        dropdownRef: React.RefObject<HTMLDivElement|null>;
    }) => React.ReactNode
}
export default function DropdownCore({ children }: DropdownProps) {
    const [isOpen, setOpen] = useState(false);
    const dropdownRef = useRef<HTMLDivElement>(null);

    useEffect(() => {
        function handleClickOutside(event: MouseEvent) {
            let ref = dropdownRef.current;
            if (isOpen && ref && !ref.contains(event.currentTarget as Node)) {
                setOpen(false);
            }
        }
        document.addEventListener('click', handleClickOutside);
        return () => document.removeEventListener('click', handleClickOutside);
    });

    const toggle = ()=>setOpen(!isOpen);

    return children({isOpen,dropdownRef,toggle});
}