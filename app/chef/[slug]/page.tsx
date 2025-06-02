import AppNavbar from "@/app/components/app-navbar";
import AppSidebarRecomendation from "@/app/components/app-sidebar-recomendation";
import ContentItemUser from "@/app/components/content-item-user";
import UserProfileCard from "@/app/components/user-profile-card";

export default async function Page({ params }: Readonly<{ params: Promise<{ slug: string }> }>) {
    const { slug } = await params;
    console.log(slug);
    return (
        <>
            <AppNavbar />
            <AppSidebarRecomendation>
                <main className="my-3 mx-3">
                    <div className="flex gap-2 flex-wrap justify-center">
                        <div className="min-w-80 lg:max-w-80 w-full mx-auto text-slate-600">
                            <UserProfileCard />
                        </div>
                        <div className="flex-1 min-w-80">
                            <div className="bg-slate-100 rounded-lg  py-1 px-1">
                                <div className="h-10 bg-slate-200/50 mb-3 rounded">

                                </div>
                                <div className="bg-slate-200/50 overflow-hidden rounded">
                                    <div className="grid md:grid-cols-2 justify-around lg:grid-cols-3 gap-1">
                                        <ContentItemUser />
                                        <ContentItemUser />
                                        <ContentItemUser />
                                        <ContentItemUser />
                                        <ContentItemUser />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </AppSidebarRecomendation>
        </>
    );

}