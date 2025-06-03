'use client';
import { useEffect, useState } from "react";
import RecipeDraftItem from "./recipe-draft-item";
import { Dialog, DialogBackdrop, DialogPanel } from "@headlessui/react";

export default function RecipeDraftContainer({onClick}:Readonly<{onClick:()=>void}>) {
    const [selectedDraft, setSelected] = useState<string[]>([]);
    const [selectedAllDraft, setSelectedAll] = useState(false);
    const [isOpen, setOpen] = useState(false);

    function deleteAll() {
        console.log(selectedDraft.length);
    }
    function toggleChangeInput(event: React.ChangeEvent<HTMLInputElement>) {
        let input = event.currentTarget;
        if (!input) return;

        setSelected(key => key.includes(input.value) ? key.filter(item => item !== input.value) : [...key, input.value]);
        console.log()
        if (selectedDraft.length === 3) {
            setSelectedAll(true);
        }
    }

    function toggleAll() {
        if (selectedAllDraft) {
            setSelected([]);
        } else {
            setSelected(['key1', 'key2', 'key3']);
        }
        setSelectedAll(!selectedAllDraft);
    }
    useEffect(() => {
        if (selectedDraft.length === 3) {
            setSelectedAll(true);
        } else {
            setSelectedAll(false);
        }

    }, [selectedDraft]);
    return (
        <>
            <div className="px-3">
                <input type="checkbox" checked={selectedAllDraft} onChange={toggleAll} name="all" id="all" className="me-2" />
                <label htmlFor="all" className="text-slate-600">All</label>
            </div>
            <div className="max-h-50 min-h-30 overflow-scroll px-3 py-1 border-y border-slate-500 mb-1">
                {/* <button className="text-sm text-slate-400 hover:text-slate-500 active:text-slate-600 cursor-pointer">Load More</button> */}
                <div className="">
                    <div className="flex items-center gap-2">
                        <input checked={selectedDraft.includes('key1')} type="checkbox" name="key1" id="key1" value={'key1'} onChange={toggleChangeInput} />
                        <RecipeDraftItem onClick={onClick} />
                    </div>
                    <div className="flex items-center gap-2">
                        <input checked={selectedDraft.includes('key2')} type="checkbox" name="key2" id="key2" value={'key2'} onChange={toggleChangeInput} />
                        <RecipeDraftItem onClick={onClick} />
                    </div>
                    <div className="flex items-center gap-2">
                        <input checked={selectedDraft.includes('key3')} type="checkbox" name="key3" id="key3" value={'key3'} onChange={toggleChangeInput} />
                        <RecipeDraftItem onClick={onClick} />
                    </div>
                </div>
            </div>
            <div className="flex items-center px-3">

                {/* <button className="float-end text-sm text-red-400 cursor-pointer">All</button> */}
                <div className="text-slate-800 align-middle me-3">{selectedDraft.length} selected</div>
                <div className="ms-auto">
                    <button onClick={() => setOpen(true)} disabled={selectedDraft.length <= 0} className="float-end disabled:text-red-400 disabled:cursor-default text-red-600 cursor-pointer"><i className="fi fi-rr-trash"></i></button>
                </div>
            </div>
            <Dialog open={isOpen} onClose={() => setOpen(false)} className={`relative z-50`}>
                <DialogBackdrop className="fixed bg-black/50 inset-0" />
                <div className="fixed inset-0">
                    <div className="flex justify-center h-screen items-center">
                        <DialogPanel className={`bg-slate-100 w-lg h-45 rounded`}>
                            <div className="p-12">
                                <p className="text-justify text-slate-600 mb-3">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dolorem, placeat <strong>{selectedDraft.length}</strong> selected draft ?</p>
                                <div className="flex justify-center items-center gap-3">
                                    <button className="cursor-pointer rounded px-3 bg-slate-600 text-slate-200" onClick={()=>setOpen(false)}>YES</button>
                                    <button className="cursor-pointer rounded px-3 bg-slate-600 text-slate-200" onClick={()=>setOpen(false)}>NO</button>
                                </div>
                            </div>
                        </DialogPanel>
                    </div>
                </div>
            </Dialog>
        </>
    );
}