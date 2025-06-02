'use client';
import DropdownCore from "./dropdown-core";

export default function UserProfileCardDropdown() {
    return (
        <DropdownCore>
            {
                ({ isOpen, dropdownRef, toggle }) => (
                    <div className="relative" ref={dropdownRef}>
                        <button onClick={toggle} className="cursor-pointer h-8 aspect-square rounded-full align-middle hover:bg-slate-200 active:bg-slate-300">
                            <i className="fi fi-rr-menu-dots"></i>
                        </button>
                        <div className={`${isOpen ? '' : 'hidden'} absolute top-8 right-5 rounded-lg rounded-tr-none overflow-hidden w-40 shadow-lg`}>
                            <button className="text-left px-3 py-1 text-nowrap bg-slate-100 hover:bg-slate-200 active:bg-slate-300 w-full">Share</button>
                            <button className="text-left px-3 py-1 text-nowrap bg-slate-100 hover:bg-slate-200 active:bg-slate-300 w-full text-red-600">Report</button>
                        </div>
                    </div>
                )
            }
        </DropdownCore>
    );
}