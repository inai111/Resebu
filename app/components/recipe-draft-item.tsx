'use client';
import { Dialog, DialogBackdrop, DialogPanel } from "@headlessui/react";
import { useState } from "react";

export default function RecipeDraftItem({onClick}:Readonly<{onClick:()=>void}>) {
    const [isOpen, setOpen] = useState(false);
    return (
        <>
            <div className="flex justify-between items-center">
                <div className="text-slate-600">
                    <a href="#" onClick={onClick} className="hover:underline line-clamp-1">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem, rem.
                    </a>
                    <small className="text-slate-500">
                        {/* <i className="fi fi-rs-book-open-cover px-2 inline-block"></i> */}
                        <i className="fi fi-rs-play px-2 inline-block"></i>
                        Tue, 22-01-2022 10:10
                        </small>
                </div>
                <button onClick={() => setOpen(true)} className="cursor-pointer text-red-600">
                    <i className="fi fi-rr-trash"></i>
                </button>
            </div>
            <Dialog open={isOpen} onClose={() => setOpen(false)}>
                <div className="relative z-50">
                    <DialogBackdrop className={`fixed inset-0 bg-black/60`} />
                    <div className="fixed inset-0">
                        <div className="flex items-center justify-center h-screen">
                            <DialogPanel className={`bg-slate-100 w-lg p-12 rounded`}>
                                <p className="text-justify text-slate-700 mb-2">
                                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nemo, omnis?
                                </p>
                                <div className="flex justify-center gap-4">
                                    <button className="cursor-pointer px-3 rounded bg-slate-600 text-slate-100" onClick={() => setOpen(false)}>
                                        Cancel
                                    </button>
                                    <button className="cursor-pointer px-3 rounded bg-red-700 text-slate-100" onClick={() => setOpen(false)}>
                                        Delete
                                    </button>
                                </div>
                            </DialogPanel>
                        </div>
                    </div>
                </div>
            </Dialog>
        </>
    );
}