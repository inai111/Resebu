'use client';
import Link from "next/link";
import { Dialog, DialogBackdrop, DialogPanel } from "@headlessui/react";
import { useState } from "react";
import ContentItemUserDropdown from "./content-item-user-dropdown";

export default function ContentItemUser() {
    const [isOpen, setOpen] = useState(false);
    function close() {
        setOpen(false);
    }
    return (
        <>
            <div className="bg-slate-100 rounded-lg m-3 overflow-hidden shadow-lg h-70 lg:aspect-square">
                <div className="relative mb-1 w-full h-45">
                    <Link href={'/recipe/article/123sda'}>
                        <img src="https://assets.tmecosys.com/image/upload/t_web_rdp_recipe_584x480_1_5x/img/recipe/ras/Assets/ef6b566965d72c09f082974440a9b1d5/Derivates/b94f1d6a161d294c5ddff7afe44102ee38791650.jpg"
                            alt=""
                            className="object-cover object-center w-full h-full" />
                    </Link>
                    <button onClick={() => setOpen(true)} className={`absolute h-6 text-slate-100 bg-black/30 hover:bg-black/40 active:bg-black/50 cursor-pointer align-middle aspect-square rounded-full top-9 right-2`}>
                        <i className="fi fi-rr-picture text-sm"></i>
                    </button>

                    <div className="absolute top-2 right-2">
                        <ContentItemUserDropdown />
                    </div>
                    {/* <button className="h-6 text-slate-100 bg-black/30 hover:bg-black/40 active:bg-black/50 cursor-pointer align-middle aspect-square rounded-full absolute top-2 right-2">
                        <i className="fi fi-rr-menu-dots-vertical text-sm"></i>
                    </button> */}
                    {/* <div title="video content" className="absolute bottom-2 left-2 rounded bg-black/60 text-slate-100 text-xs/3 px-1">
                <i className="fi fi-sr-caret-right align-middle w-4 inline-block"></i>
                24:00</div> */}
                    <div title="article content" className="absolute bottom-2 left-2 rounded bg-black/60 text-slate-100 text-xs/3 px-1">
                        <i className="fi fi-sr-book-open-cover align-middle"></i></div>
                </div>
                <div className="mx-3 text-slate-700">
                    <div className="text-lg/5 line-clamp-2 text-slate-800 mb-1" title="Lorem ipsum dolor sit amet consectetur adipisicing elit. Et, vitae.">Lorem ipsum dolor sit amet consectetur adipisicing elit. Et, vitae.</div>
                    <p className="text-sm line-clamp-1 text-justify mb-2"
                        title="Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit repellat quisquam earum saepe exercitationem autem ullam rerum, eveniet omnis harum possimus dolor quaerat magnam beatae ipsum quis fuga aut maxime! Ullam, dolorem ducimus consequuntur eligendi similique, dignissimos sunt laudantium magni provident iste recusandae ex quos ea voluptatum. Soluta, ab libero?"
                    >Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit repellat quisquam earum saepe exercitationem autem ullam rerum, eveniet omnis harum possimus dolor quaerat magnam beatae ipsum quis fuga aut maxime! Ullam, dolorem ducimus consequuntur eligendi similique, dignissimos sunt laudantium magni provident iste recusandae ex quos ea voluptatum. Soluta, ab libero?</p>
                    <div className="align-middle text-xs text-slate-400">
                        <span className="float-start">4</span>
                        <i className="fi text-sm fi-ss-star align-top text-amber-500 float-start mx-1"></i>
                        <span className="float-start">( 200+ )</span>
                        <span className="float-end">1 year ago</span>
                    </div>
                </div>
            </div>
            <Dialog open={isOpen} as="div" onClose={close} className={`relative z-50`}>
                <DialogBackdrop className={`fixed bg-black/30 inset-0`} />
                <div className="fixed inset-0">
                    <div className="flex justify-center items-center min-h-full">
                        <DialogPanel className={`max-w-lg bg-white p-2 relative`}>
                            <button onClick={() => setOpen(false)} className="absolute top-1 right-1 cursor-pointer rounded-full bg-black/30 active:bg-black/50 hover:bg-black/40 text-slate-100 w-8 aspect-square">
                                <i className="fi fi-br-cross  text-sm/2"></i>
                            </button>
                            <div className={` p-1 rounded-lg rounded-tr-none top-6 right-3 z-20`}>
                                <img src="https://assets.tmecosys.com/image/upload/t_web_rdp_recipe_584x480_1_5x/img/recipe/ras/Assets/ef6b566965d72c09f082974440a9b1d5/Derivates/b94f1d6a161d294c5ddff7afe44102ee38791650.jpg"
                                    alt=""
                                    className="w-full object-contain" />
                            </div>
                        </DialogPanel>
                    </div>
                </div>
            </Dialog>
        </>
    );
}