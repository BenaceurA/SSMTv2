
<form class="w-full mb-10 bg-opacity-90 bg-white p-10 pt-5 rounded-md" action="/modifyPassword" method="post" enctype="multipart/form-data">
    @csrf
    <h1 class="block text-gray-500 font-bold mb-5 text-xl pr-4">Changer votre mot de passe</h1>
        @error("pwderror")
        <div class="mb-4">
        <strong class="text-red-700 font-bold">{{ $message }}</strong>
        </div>
        @enderror
        @error("pwdsuccess")
        <div class="mb-4">
        <strong class="text-green-700 font-bold">{{ $message }}</strong>
        </div>
        @enderror
        <div class="md:flex md:items-center mb-8">
            <div class="flex justify-start md:w-1/4">
                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="currentPassword">
                    Mot de passe
                </label>
            </div>
            <div class="md:w-3/4">
                <input required class="bg-white-200 appearance-none border-2 border-white-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" name="currentPassword" id="currentPassword" type="password">
            </div>
        </div>
        <div class="md:flex md:items-center mb-8">
            <div class="flex justify-start md:w-1/4">
                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="newPassword">
                    Nouveau mot de passe
                </label>
            </div>
            <div class="md:w-3/4">
                <input required class="bg-white-200 appearance-none border-2 border-white-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" name="newPassword" id="newPassword" type="password">
            </div>
        </div>
        <div class="md:flex md:items-center mb-8">
            <div class="flex justify-start md:w-1/4">
                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="confirmPassword">
                    confirmer mot de passe
                </label>
            </div>
            <div class="md:w-3/4">
                <input required class="bg-white-200 appearance-none border-2 border-white-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" name="confirmPassword" id="confirmPassword" type="password">
            </div>
        </div>
        <div class="flex justify-center">
            <button class="mt-4 w-1/6 shadow bg-yellow-500 hover:bg-yellow-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">
                  Modifier
            </button>
        </div>         
</form>