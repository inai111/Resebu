import Link from "next/link";

export default function ChefRecomendationCard() {
    return (
        <Link href="/chef/sluga2-1dddd" className="w-full inline-block mb-1">
            <div className="flex items-center gap-1">
                <div>
                    <img src="https://png.pngtree.com/png-clipart/20240314/original/pngtree-goat-s-face-on-eid-ul-adha-png-image_14587232.png"
                        alt="goat"
                        className="object-center rounded-full object-contain w-15 aspect-square" />
                </div>
                <div className="text-slate-100 flex-1">
                    <div className="text-lg/4 lin mb-0 pb-0">
                        Mamat Solar<i className="fi fi-rr-angle-small-right font-extrabold float-end"></i>
                    </div>
                    <div className="text-xs">
                        <h3>Resep<span className="float-end font-bold bg-slate-400 px-3 rounded-full text-slate-800">400</span>
                        </h3>
                    </div>
                    {/* <div className="text-xs bg-amber-600 rounded px-2">Jago di Makanan Kering</div> */}
                    <div className="p-1 bg-slate-900 rounded">
                        <div className="text-xs line-clamp-3">
                            Resep barunya <span className="font-bold">Masakan NusantaraMasakan NusantaraMasakan NusantaraMasakan NusantaraMasakan Nusantara</span>
                        </div>
                    </div>
                </div>
            </div>
        </Link>
    );
}