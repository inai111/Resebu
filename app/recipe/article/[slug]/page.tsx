import AppNavbar from "@/app/components/app-navbar";
import EditTitle from "./edit-title";
import ContentEditDescription from "@/app/components/content-edit-description";
import EditableContent from "./editable-content";
import EditRecipes from "./edit-recipes";

export default async function Page({ params }: Readonly<{ params: Promise<{ slug: string }> }>) {
    const { slug } = await params;
    console.log(slug)
    return (
        <>
            <AppNavbar />
            <div className="flex justify-center items-center min-h-screen">
                <div className="relative my-3">
                    <div className="sticky top-21">
                        <div className="absolute  -left-15 h-50 rounded-full w-12 bg-slate-100">
                        </div>
                    </div>
                    <div className="min-h-250 p-5 lg:w-200 overflow-scroll bg-slate-100 mb-3 text-slate-700">
                        <small className="text-xs/1 text-slate-400 print:hidden">Last saved  </small>
                        <EditTitle />
                        <div className="mb-3 mx-auto">
                            <label htmlFor="cover">
                                <div title="add cover" className="h-60 border-dashed border-3 cursor-pointer border-slate-400 flex items-center justify-center">
                                    <i className="fi fi-rr-add-image text-xl/0"></i>
                                </div>
                            </label>
                            <input type="file" name="cover" id="cover" className="h-0 opacity-0" />
                        </div>
                        <div className="mb-2">
                            <h3 className="font-semibold">
                                Description
                            </h3>
                            <ContentEditDescription
                                contentData={`
                                But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids
                                `}
                            />

                        </div>
                        <div className="mb-2">
                            <h3 className="font-semibold">
                                Recipes
                            </h3>
                            <EditRecipes />
                            
                        </div>
                        <div className="break-inside-avoid">
                            <h3 className="font-semibold">
                                Steps
                            </h3>
                            <div>
                                <ul className="list-decimal ms-5 [&_li]:break-inside-avoid">
                                    <li>
                                        <div>
                                            But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids
                                        </div>
                                    </li>
                                    <li>
                                        <div>
                                            But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids
                                        </div>
                                    </li>
                                    <li>
                                        <div>
                                            But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids
                                        </div>
                                    </li>
                                    <li>
                                        <div>
                                            But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids
                                        </div>
                                    </li>
                                    <li>
                                        <div>
                                            But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids
                                        </div>
                                    </li>
                                    <li>
                                        <div>
                                            But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids
                                        </div>
                                    </li>
                                    <li>
                                        <div>
                                            But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </>
    );
}