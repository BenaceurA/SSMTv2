<div class="top-0 fixed text-sm text-white border-b-2 border-yellow-500 bg-opacity-70 bg-black w-full" style="height: 108px;font-family: 'Montserrat', sans-serif;">
    <div class="w-full h-full flex justify-center">
        <div class="flex justify-between h-full mt-auto mb-auto w-11/12 lg:w-11/12 xl:w-10/12 2xl:w-8/12">
            <a class="flex mr-2 pt-2 pb-2" href="/"><img class="mt-auto mb-auto" id="logo" src="{{ asset('/img/logo.png') }}"></a>
            <div class="flex mt-auto mb-auto">
                {{-- <div class = "cursor-pointer mr-8 ">             
                    <a id="contactAnchor" onclick="showContact()" class="pt-10 pb-10 font-semibold hover:text-yellow-400 text-yellow-400 border-b-4 border-yellow-400 hover:border-opacity-100" >CONTACT</a>
                </div> --}}
                <div class = "hidden xl:block cursor-pointer mr-4 xl:mr-8">
                    <a href="/map" class="pt-10 pb-10 font-semibold hover:text-yellow-400 {{--border-b-4 border-yellow-500 border-opacity-0 hover:border-opacity-100 --}}">COMMENT VENIR</a>
                </div>
                <div class = "hidden xl:block cursor-pointer">
                    <a href="/about" class="pt-10 pb-10 font-semibold hover:text-yellow-400 {{--border-b-4 border-yellow-500 border-opacity-0 hover:border-opacity-100--}}">À PROPOS</a>
                </div>
                <div onclick="showContact()" class = "xl:hidden cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <path fill="#FFFFFF" d="M24 6h-24v-4h24v4zm0 4h-24v4h24v-4zm0 8h-24v4h24v-4z"/>
                    </svg>
                </div>
            </div>           
        </div>
    </div>
    <div id="contact" class="hidden xl:hidden mt-1 relative w-full flex justify-center bg-opacity-100 z-50 bg-black h-64 xl:h-8">
        <div class="flex flex-col xl:flex-row items-center xl:justify-between h-full mt-auto mb-auto w-11/12 lg:w-11/12 xl:w-10/12 2xl:w-8/12">
            <div class = "xl:hidden cursor-pointer mt-auto mb-auto">
                    <a target=”_blank” href="https://www.google.com/maps/@30.4860469,-9.271197,16z" class="font-semibold hover:text-yellow-400 border-b-4 border-yellow-500 border-opacity-0 hover:border-opacity-100" style="font-family:'Arial'">COMMENT VENIR</a>
            </div>
            <div class = "xl:hidden cursor-pointer mt-auto mb-auto">
                    <a href="/about" class=" font-semibold hover:text-yellow-400 border-b-4 border-yellow-500 border-opacity-0 hover:border-opacity-100" style="font-family:'Arial'">À PROPOS</a>
            </div>
            <div class="font-semibold flex mt-auto mb-auto">
                <span class="mr-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" viewBox="0 0 24 24"><path fill="#FFFFFF" d="M18.48 22.926l-1.193.658c-6.979 3.621-19.082-17.494-12.279-21.484l1.145-.637 3.714 6.467-1.139.632c-2.067 1.245 2.76 9.707 4.879 8.545l1.162-.642 3.711 6.461zm-9.808-22.926l-1.68.975 3.714 6.466 1.681-.975-3.715-6.466zm8.613 14.997l-1.68.975 3.714 6.467 1.681-.975-3.715-6.467z"/></svg>
                </span>
                <span class="mr-2">
                    Telephone 
                </span>
                <span style="font-family:'Arial';padding-top:1px;">
                    05 28 55 10 98
                </span>
            </div>
            <div class="font-semibold flex mt-auto mb-auto">
                <span class="mr-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" viewBox="0 0 24 24"><path fill="#FFFFFF" d="M13.693 10.812l1.306 2.452-.928.492c-2.506 1.238-6.783-6.771-4.346-8.141l.936-.499 1.307 2.455-.926.493c-.734.427.974 3.633 1.727 3.238l.924-.49zm10.307.188v12h-24v-12h4v-10h10.328c1.538 0 5.672 4.852 5.672 6.031v3.969h4zm-18 5h12v-8.396c0-1.338-2.281-1.494-3.25-1.229.453-.813.305-3.375-1.082-3.375h-7.668v13zm16-3h-2v5h-16v-5h-2v8h20v-8z"/></svg>
                </span>
                <span class="mr-2">
                    Fax 
                </span>
                <span style="font-family:'Arial';padding-top:1px;">
                    05 28 55 17 04
                </span>
            </div>
            <div class="font-semibold flex mt-auto mb-auto">
                <span class="mr-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" viewBox="0 0 24 24"><path fill="#FFFFFF" d="M0 3v18h24v-18h-24zm6.623 7.929l-4.623 5.712v-9.458l4.623 3.746zm-4.141-5.929h19.035l-9.517 7.713-9.518-7.713zm5.694 7.188l3.824 3.099 3.83-3.104 5.612 6.817h-18.779l5.513-6.812zm9.208-1.264l4.616-3.741v9.348l-4.616-5.607z"/></svg>
                </span>
                <span class="mr-2">
                    Email 
                </span>
                <span style="font-family:'Arial'">
                    info@ssmt.ma
                </span>
            </div>
            <div class="font-semibold flex mt-auto mb-auto">
                <span class="mr-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" viewBox="0 0 24 24"><path fill="#FFFFFF" d="M12 2c3.196 0 6 2.618 6 5.602 0 3.093-2.493 7.132-6 12.661-3.507-5.529-6-9.568-6-12.661 0-2.984 2.804-5.602 6-5.602m0-2c-4.198 0-8 3.403-8 7.602 0 4.198 3.469 9.21 8 16.398 4.531-7.188 8-12.2 8-16.398 0-4.199-3.801-7.602-8-7.602zm0 11c-1.657 0-3-1.343-3-3s1.343-3 3-3 3 1.343 3 3-1.343 3-3 3z"/></svg>
                </span>
                <span class="mr-2">
                    Adresse 
                </span>
                <span style="font-family:'Arial'">
                    Imm Larki, 2eme Etage, Blachache M'haita - Taroudant
                </span>
            </div>
        </div>
        {{-- <div onclick="hideContact()" id="closeContact" class="cursor-pointer h-3 w-3 right-0 mr-2 absolute" style="padding-top:10px;">
            <svg x="0px" y="0px" viewBox="0 0 10 10">
                <polygon fill="#ffffff" points="10,1 9,0 5,4 1,0 0,1 4,5 0,9 1,10 5,6 9,10 10,9 6,5"></polygon>
            </svg>
        </div> --}}
    </div>
</div>
<script>
    let contact = document.getElementById("contact");
    function showContact(){
        contact.classList.toggle("hidden");
    }
</script>