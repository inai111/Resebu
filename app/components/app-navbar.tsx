'use client';
import Image from "next/image";
import Link from "next/link";
import defaultImage from '@/public/default.png'
import { useEffect, useRef, useState } from "react";


export default function AppNavbar() {
  const [openDropdownMain, setOpenDropdownMain] = useState(false);
  const [openDropdownUser, setOpenDropdownUser] = useState(false);
  const dropdownMainContainer = useRef<HTMLDivElement>(null);
  const dropdownMainMenu = useRef<HTMLDivElement>(null);
  const dropdownUserContainer = useRef<HTMLDivElement>(null);
  const dropdownUserMenu = useRef<HTMLDivElement>(null);

  function toggleMainDropdown() {
    setOpenDropdownMain(!openDropdownMain);
    setOpenDropdownUser(false);
  }
  
  function toggleUserDropdown() {
    setOpenDropdownUser(!openDropdownUser);
    setOpenDropdownMain(false);
  }

  useEffect(() => {
    function handleClickOutside(event: MouseEvent) {
      let mainCont = dropdownMainContainer.current;
      let userCont = dropdownUserContainer.current;

      if (mainCont && !mainCont.contains(event.currentTarget as Node) && openDropdownMain) {
        setOpenDropdownMain(false);
      }
      if (userCont && !userCont.contains(event.currentTarget as Node) && openDropdownUser) {
        setOpenDropdownUser(false);
      }
    }
    document.addEventListener('click', handleClickOutside);
    return () => document.removeEventListener('click', handleClickOutside);
  })

  return (
    <div className="h-20 print:hidden">
      <nav className="flex justify-between px-3 h-20 items-center py-1 fixed top-0 w-full z-20 bg-slate-100/60 backdrop-blur-md">
        <Link href='/' className="text-black flex items-center lg:text-3xl text-xl font-bold cursor-pointer hover:text-slate-800 md:w-60 lg:w-80 justify-center">!Resebu!
          <Image
            src={defaultImage}
            alt="!Resebu!"
            className="lg:w-15 hidden md:block md:w-8 ms-2"
          />
        </Link>
        <div className="relative" ref={dropdownMainContainer}>
          <button onClick={toggleMainDropdown} className="cursor-pointer md:hidden block px-3">
            <Image
              src={defaultImage}
              alt="!Resebu!"
              className="w-8 ms-2"
            />
          </button>
          <div ref={dropdownMainMenu} className={`${!openDropdownMain && 'hidden'} absolute text-slate-600 md:items-center md:flex md:static top-10 right-0 py-1 shadow md:py-0 md:rounded-lg md:rounded-tr-none w-60 md:w-full bg-slate-100 md:bg-transparent md:shadow-none`}>
            <div className="relative px-2">
              <button className="rounded-full md:me-2 w-full my-2 md:mx-0 px-2 md:w-60 md:pe-0 pe-5 py-1 text-slate-400 hover:text-slate-500 cursor-pointer border hover:border-slate-700 border-slate-500 flex items-center">
                <i className="fi fi-br-search inline-block w-8 text-md/0"></i>Pencarian
              </button>
            </div>
            <Link href="/recipe/create" className="hover:bg-slate-300 md:hover:bg-transparent md:active:bg-transparent md:me-2 active:bg-slate-400 text-nowrap py-2 block mx-auto md:py-0">
              <i className="fi fi-rr-square-plus md:text-2xl/1 inline-block w-8 ms-3 md:align-middle"></i>Tambah Resep
            </Link>
            <div className="w-full h-2 md:hidden mb-3  border-b-2 border-b-slate-200"></div>
            <div className="md:h-8 md:w-2  border-e-2 border-e-slate-200"></div>
            <div ref={dropdownUserContainer}>
              <button onClick={toggleUserDropdown} className="hover:bg-slate-300 hidden md:hover:bg-transparent md:active:bg-transparent active:bg-slate-400 py-2 md:block w-full cursor-pointer text-left text-nowrap md:py-0">
                <i className="fi fi-rr-user md:text-2xl/1 inline-block w-8 ms-3 md:align-middle"></i>User
              </button>
              <div ref={dropdownUserMenu} className={`flex-col ${!openDropdownUser && 'md:hidden'} md:absolute md:top-12 md:right-8 md:bg-slate-100 md:w-60 md:overflow-hidden md:shadow md:rounded-lg md:rounded-tr-none`}>
                <Link href="/recipe/create" className="hover:bg-slate-300 active:bg-slate-400 py-2 block text-nowrap">
                  <i className="fi fi-rr-settings inline-block w-8 ms-3 md:align-middle"></i>User Settings
                </Link>
                <button className="hover:bg-slate-300 active:bg-slate-400 py-2 block w-full cursor-pointer text-left text-nowrap">
                  <i className="fi fi-rr-enter inline-block w-8 ms-3 md:align-middle"></i>Sign In
                </button>
                <button className="hover:bg-slate-300 active:bg-slate-400 py-2 block w-full cursor-pointer text-left text-nowrap">
                  <i className="fi fi-rr-exit inline-block w-8 ms-3 md:align-middle"></i>Sign Out
                </button>
              </div>
            </div>
          </div>
        </div>
      </nav>
    </div>
  );
}
