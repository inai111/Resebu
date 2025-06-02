import UserProfileCardDescription from "./user-profile-card-description";
import UserProfileCardDropdown from "./user-profile-card-dropdown";

export default function UserProfileCard() {
    return (
        <div className="bg-slate-100 rounded-lg w-full h-full shadow-lg py-3 px-4">
            <div className="flex justify-between items-center mb-3">
                <h3 className="font-semibold tracking-wide">User Profile</h3>
                <UserProfileCardDropdown />
            </div>
            <div className="rounded-full overflow-hidden aspect-square w-30 mx-auto mb-3">
                <img src="https://media.istockphoto.com/id/903592580/photo/portrait-of-a-goat-showing-tongue.jpg?s=612x612&w=0&k=20&c=ybl1XF7yF9AebG3dtAxvSRriTOkFZT2hpkAqKbugdo0="
                    alt="cover"
                    className="w-full h-full object-center object-cover" />
            </div>
            <div className="mb-3 text-center border-b pb-1">
                <h3 className="text-lg/4 font-bold line-clamp-2">Mamat</h3>
                <h3 className="text-sm">@Mamat</h3>
            </div>
            <div className="mb-3">
                <UserProfileCardDescription>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis consequuntur ad repudiandae consectetur magnam natus architecto doloribus, sit aliquid quam excepturi possimus repellendus eaque ut deserunt placeat. Odio, numquam. Consectetur?
                </UserProfileCardDescription>
            </div>
            <div className="mb-3">
                <h3 className="font-semibold tracking-wide mb-3">Last Activity</h3>
                <div className="flex flex-col gap-2 mb-1 text-sm">
                    <div className="shadow bg-slate-200 rounded px-5 ">
                        <div className="line-clamp-1">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi, vel!
                        </div>
                        <div className="text-xs text-slate-400 float-end">6 year ago</div>
                    </div>
                    <div className="shadow bg-slate-200 rounded px-5 ">
                        <div className="line-clamp-1">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi, vel!
                        </div>
                        <div className="text-xs text-slate-400 float-end">6 year ago</div>
                    </div>
                </div>

            </div>
        </div>
    );
}