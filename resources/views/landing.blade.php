<x-guest-layout>
  <nav class="fixed top-0 inset-x-0 bg-white z-50"
  x-data="{open : false}">
    <div class="px-8 py-7 relative w-full lg:mx-auto lg:container xl:max-w-screen-lg flex flex-wrap items-center justify-between bg-white z-50">
      <!-- Left nav -->
      <div class="flex items-center">
        <a class="w-[100px]" 
        href="https://nftfactoryparis.com/">
          <svg class="inline-block w-[100px]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 130.789 77.556">
            <g id="Groupe_7" data-name="Groupe 7" transform="translate(-1501.179 -797.635)">
              <g id="Groupe_7-2" data-name="Groupe 7">
                <path id="Tracé_13" data-name="Tracé 13" d="M1549.352,824.974c3.007,0,5.1,1.611,5.532,4.564h3.463c-.564-4.671-3.92-7.571-9.048-7.571-5.827,0-9.371,4.215-9.371,9.72,0,5.53,3.544,9.746,9.371,9.746,5.128,0,8.484-2.9,9.048-7.6h-3.463c-.43,2.953-2.525,4.591-5.532,4.591-3.759,0-5.96-2.551-5.96-6.739C1543.392,827.525,1545.593,824.974,1549.352,824.974Z"/>
                <path id="Tracé_14" data-name="Tracé 14" d="M1585.733,821.967c-5.826,0-9.344,4.215-9.344,9.72,0,5.53,3.518,9.746,9.344,9.746,5.8,0,9.317-4.216,9.317-9.746C1595.05,826.182,1591.533,821.967,1585.733,821.967Zm0,16.459c-3.92,0-5.88-2.739-5.88-6.739,0-3.975,1.96-6.713,5.88-6.713s5.854,2.738,5.854,6.713C1591.587,835.687,1589.653,838.426,1585.733,838.426Z"/>
                <path id="Tracé_15" data-name="Tracé 15" d="M1559.286,822.235v3.007h4.161v-1.562h2.184l.018,17.484h3.464V825.243h6.31v-3.007Z"/>
                <path id="Tracé_16" data-name="Tracé 16" d="M1532.973,822.235h-7.115l-5.72,18.93h3.491l1.96-6.6h7.679l1.96,6.6h3.491Zm-6.5,9.317,1.861-5.561v-2.31h2.185v2.39l1.834,5.481Z"/>
                <path id="Tracé_17" data-name="Tracé 17" d="M1519.926,825.243v-3.007H1506.85v18.929h3.464l.019-8.194h2.184v1.589l6.523,0v-3.009l-8.726-.027.019-7.844h2.184v1.562Z"/>
                <path id="Tracé_18" data-name="Tracé 18" d="M1611.241,834.2H1609.7v-2.184h2.208a2.833,2.833,0,0,0,.956-.871c.056-.081.108-.164.157-.248a6.054,6.054,0,0,0,.728-3.1,6.236,6.236,0,0,0-.318-1.933,4.459,4.459,0,0,0-1.125-1.787,5.892,5.892,0,0,0-2.2-1.31,10.539,10.539,0,0,0-3.534-.5h-8.258v18.9h3.151V833.7l6.039-.013,3.6,7.479h3.494Zm-4.428-3.2h-5.345V824.91h5.027a7.294,7.294,0,0,1,1.906.212,3.281,3.281,0,0,1,1.231.595,2.146,2.146,0,0,1,.662.927,3.489,3.489,0,0,1,.2,1.2,4.557,4.557,0,0,1-.173,1.3,2.313,2.313,0,0,1-.582.993,2.722,2.722,0,0,1-1.125.635A6.1,6.1,0,0,1,1606.813,831Z"/>
                <path id="Tracé_19" data-name="Tracé 19" d="M1628.263,822.235l-3.889,7.225v2.8h-2.184v-2.8l-3.889-7.225H1614.6l6.954,12.458v6.471h3.464v-6.471l6.954-12.458Z"/>
              </g>
              <g id="Groupe_8" data-name="Groupe 8">
                <path id="Tracé_20" data-name="Tracé 20" d="M1544.25,797.635v3.007h4.163v-1.562h2.184v.6l.016,16.889h3.464V800.642h6.31v-3.007Z"/>
                <path id="Tracé_21" data-name="Tracé 21" d="M1541.432,800.642v-3.007h-13.076v18.929h3.464l.019-8.194h2.184v1.589l6.523,0v-3.009l-8.726-.027.019-7.844h2.184v1.562Z"/>
                <path id="Tracé_22" data-name="Tracé 22" d="M1521.218,797.635l.016,17.484h-2.184v-4.03l-5.353-13.454h-6.847v18.929h3.483l-.033-17.488,2.188,0V803.3l5.29,13.265h6.847V797.635Z"/>
              </g>
              <path id="Tracé_23" data-name="Tracé 23" d="M1523.863,858.178v-2.836h-5.671v-2.836h-5.671v-5.671h-5.671v14.178h-5.671v14.178h28.355V858.178Z" fill="#2ef52f"/>
            </g>
          </svg>
        </a>
      </div>
      <!-- / left nav -->
  
      <!-- Right nav -->
      <!-- Show menu sm,md -->
      <!-- Toggle button -->
      <div class="block text-black cursor-pointer lg:hidden">
        <button @click="open = ! open" class="w-10 h-full text-lg flex justify-center items-center group">
          <div>
            <div class="w-7 h-0.5 mb-[5px] bg-black group-hover:mb-[7px] transition ease-in-out duration-100"
            :class="open ? '-rotate-45 translate-y-1' : ''"></div>
            <div class="w-7 h-0.5 bg-black"
            :class="open ? 'hidden' : ''"></div>
            <div class="w-7 h-0.5 mt-[5px] bg-black group-hover:mt-[7px] transition ease-in-out duration-100"
            :class="open ? 'rotate-45 -translate-y-1' : ''"></div>
          </div>

        </button>
      </div>
      <!-- / toggle button -->
  
      <!-- Show Menu lg -->
      <div class="hidden w-full lg:flex lg:items-center lg:w-auto">
        <a class="relative block py-3 font-bold hover:text-NFTF-green text-lg transition linear duration-200"
        href="https://nftfactoryparis.com/programme">
          PROGRAMME
        </a>

        <a class="ml-9 relative block py-3 font-bold hover:text-NFTF-green text-lg transition linear duration-200"
        href="https://nftfactoryparis.com/ecosysteme">
          ECOSYSTÈME
        </a>


        <a class="ml-9 relative block py-3 font-bold text-NFTF-green text-lg transition linear duration-200"
          href="https://nftfactoryparis.com/ventes">
            ŒUVRES EN VENTE
          </a>

          <a class="ml-8 relative block py-3 font-bold hover:text-NFTF-green text-lg transition linear duration-200"
          href="https://nftfactoryparis.com/communaute">
            COMMUNAUTÉ
          </a>

          <a class="ml-7 relative block py-3 font-bold hover:text-NFTF-green text-lg transition linear duration-200"
          href="https://nftfactoryparis.com/communaute">
            À PROPOS
          </a>

          <a class="ml-9 relative block py-3 font-bold hover:text-NFTF-green text-lg transition linear duration-200"
          href="https://nftfactoryparis.com/gm">
            CONTACT
          </a>

          <a class="ml-9 hover:text-NFTF-green transition linear duration-200"
          href="https://twitter.com/nftfactoryparis"
          target="_blank" 
          rel="noopener noreferrer">
            <svg xmlns="http://www.w3.org/2000/svg" class="fill-current w-5 h-5" version="1.1" width="18" hight="18" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" x="0" y="0" viewBox="0 0 512 512" xml:space="preserve" class=""><g>
              <g xmlns="http://www.w3.org/2000/svg">
                <g>
                  <path d="M512,97.248c-19.04,8.352-39.328,13.888-60.48,16.576c21.76-12.992,38.368-33.408,46.176-58.016    c-20.288,12.096-42.688,20.64-66.56,25.408C411.872,60.704,384.416,48,354.464,48c-58.112,0-104.896,47.168-104.896,104.992    c0,8.32,0.704,16.32,2.432,23.936c-87.264-4.256-164.48-46.08-216.352-109.792c-9.056,15.712-14.368,33.696-14.368,53.056    c0,36.352,18.72,68.576,46.624,87.232c-16.864-0.32-33.408-5.216-47.424-12.928c0,0.32,0,0.736,0,1.152    c0,51.008,36.384,93.376,84.096,103.136c-8.544,2.336-17.856,3.456-27.52,3.456c-6.72,0-13.504-0.384-19.872-1.792    c13.6,41.568,52.192,72.128,98.08,73.12c-35.712,27.936-81.056,44.768-130.144,44.768c-8.608,0-16.864-0.384-25.12-1.44    C46.496,446.88,101.6,464,161.024,464c193.152,0,298.752-160,298.752-298.688c0-4.64-0.16-9.12-0.384-13.568    C480.224,136.96,497.728,118.496,512,97.248z"></path>
                </g>
              </g>
            </svg>
          </a>

          <a class="ml-4 hover:text-NFTF-green transition linear duration-200"
          href="https://discord.com/invite/aZ2uNqkFjQ"
          target="_blank" 
          rel="noopener noreferrer">
            <svg class="fill-current" width="18" hight="18" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" x="0" y="0" viewBox="0 0 24 24" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="m3.58 21.196h14.259l-.681-2.205 1.629 1.398 1.493 1.338 2.72 2.273v-21.525c-.068-1.338-1.22-2.475-2.648-2.475l-16.767.003c-1.427 0-2.585 1.139-2.585 2.477v16.24c0 1.411 1.156 2.476 2.58 2.476zm10.548-15.513-.033.012.012-.012zm-7.631 1.269c1.833-1.334 3.532-1.27 3.532-1.27l.137.135c-2.243.535-3.26 1.537-3.26 1.537s.272-.133.747-.336c3.021-1.188 6.32-1.102 9.374.402 0 0-1.019-.937-3.124-1.537l.186-.183c.291.001 1.831.055 3.479 1.26 0 0 1.844 3.15 1.844 7.02-.061-.074-1.144 1.666-3.931 1.726 0 0-.472-.534-.808-1 1.63-.468 2.24-1.404 2.24-1.404-.535.337-1.023.537-1.419.737-.609.268-1.219.4-1.828.535-2.884.468-4.503-.315-6.033-.936l-.523-.266s.609.936 2.174 1.404c-.411.469-.818 1.002-.818 1.002-2.786-.066-3.802-1.806-3.802-1.806 0-3.876 1.833-7.02 1.833-7.02z" class=""></path><path d="m14.308 12.771c.711 0 1.29-.6 1.29-1.34 0-.735-.576-1.335-1.29-1.335v.003c-.708 0-1.288.598-1.29 1.338 0 .734.579 1.334 1.29 1.334z"class=""></path><path d="m9.69 12.771c.711 0 1.29-.6 1.29-1.34 0-.735-.575-1.335-1.286-1.335l-.004.003c-.711 0-1.29.598-1.29 1.338 0 .734.579 1.334 1.29 1.334z" ></path></g>
            </svg>
          </a>

          <a class="ml-4 hover:text-NFTF-green transition linear duration-200"
          href="https://www.linkedin.com/company/nftfactory"
          target="_blank" 
          rel="noopener noreferrer">
            <svg class="fill-current " width="18" hight="18" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" x="0" y="0" viewBox="0 0 24 24" xml:space="preserve"><g><path d="m23.994 24v-.001h.006v-8.802c0-4.306-.927-7.623-5.961-7.623-2.42 0-4.044 1.328-4.707 2.587h-.07v-2.185h-4.773v16.023h4.97v-7.934c0-2.089.396-4.109 2.983-4.109 2.549 0 2.587 2.384 2.587 4.243v7.801z"></path><path d="m.396 7.977h4.976v16.023h-4.976z" ></path><path d="m2.882 0c-1.591 0-2.882 1.291-2.882 2.882s1.291 2.909 2.882 2.909 2.882-1.318 2.882-2.909c-.001-1.591-1.292-2.882-2.882-2.882z"></path></g></svg>
          </a>
      </div>
      <!-- / show Menu lg -->
      <!-- / right nav -->
      </div>

      <!-- Toggle menu -->
      <div class="hidden pt-24 fixed inset-0 bg-NFTF-green z-40"
      :class=" open ? '!block' : ''">
        <div class="my-3 pt-16 space-y-2 flex flex-col text-center">						 
          <a class="px-4 relative block font-black text-4xl text-center hover:text-white transition linear duration-200"
          href="https://nftfactoryparis.com/programme">
            Programme
          </a>
          <a class="px-4 relative block font-black text-4xl text-center hover:text-white transition linear duration-200"
          href="https://nftfactoryparis.com/ecosysteme">
            Ecosystème
          </a>
          <a class="px-4 relative block font-black text-4xl text-center hover:text-white transition linear duration-200"
          href="https://nftfactoryparis.com/ventes">
            Œuvres en vente
          </a>
          <a class="px-4 relative block font-black text-4xl text-center hover:text-white transition linear duration-200"
          href="https://nftfactoryparis.com/communaute">
            Communauté
          </a>
          <a class="px-4 relative block font-black text-4xl text-center hover:text-white transition linear duration-200"
          href="https://nftfactoryparis.com/a-propos">
            À propos
          </a>
          <a class="px-4 relative block font-black text-4xl text-center hover:text-white transition linear duration-200"
          href="https://nftfactoryparis.com/gm">
            Contact
          </a>
  
          <div class="pt-6 flex gap-5 justify-center items-center">
            <a class="mr-3 hover:text-white transition linear duration-200"
            href="https://twitter.com/nftfactoryparis"
            target="_blank" 
            rel="noopener noreferrer">
              <svg xmlns="http://www.w3.org/2000/svg" class="fill-current w-5 h-5" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" x="0" y="0" viewBox="0 0 512 512" xml:space="preserve" class=""><g>
                <g xmlns="http://www.w3.org/2000/svg">
                  <g>
                    <path d="M512,97.248c-19.04,8.352-39.328,13.888-60.48,16.576c21.76-12.992,38.368-33.408,46.176-58.016    c-20.288,12.096-42.688,20.64-66.56,25.408C411.872,60.704,384.416,48,354.464,48c-58.112,0-104.896,47.168-104.896,104.992    c0,8.32,0.704,16.32,2.432,23.936c-87.264-4.256-164.48-46.08-216.352-109.792c-9.056,15.712-14.368,33.696-14.368,53.056    c0,36.352,18.72,68.576,46.624,87.232c-16.864-0.32-33.408-5.216-47.424-12.928c0,0.32,0,0.736,0,1.152    c0,51.008,36.384,93.376,84.096,103.136c-8.544,2.336-17.856,3.456-27.52,3.456c-6.72,0-13.504-0.384-19.872-1.792    c13.6,41.568,52.192,72.128,98.08,73.12c-35.712,27.936-81.056,44.768-130.144,44.768c-8.608,0-16.864-0.384-25.12-1.44    C46.496,446.88,101.6,464,161.024,464c193.152,0,298.752-160,298.752-298.688c0-4.64-0.16-9.12-0.384-13.568    C480.224,136.96,497.728,118.496,512,97.248z"></path>
                  </g>
                </g>
              </svg>
            </a>

            <a class="mr-3 hover:text-rose-800"
            href="https://discord.com/invite/aZ2uNqkFjQ"
            target="_blank" 
            rel="noopener noreferrer">
              <svg class="fill-current w-5 h-5" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" x="0" y="0" viewBox="0 0 24 24" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="m3.58 21.196h14.259l-.681-2.205 1.629 1.398 1.493 1.338 2.72 2.273v-21.525c-.068-1.338-1.22-2.475-2.648-2.475l-16.767.003c-1.427 0-2.585 1.139-2.585 2.477v16.24c0 1.411 1.156 2.476 2.58 2.476zm10.548-15.513-.033.012.012-.012zm-7.631 1.269c1.833-1.334 3.532-1.27 3.532-1.27l.137.135c-2.243.535-3.26 1.537-3.26 1.537s.272-.133.747-.336c3.021-1.188 6.32-1.102 9.374.402 0 0-1.019-.937-3.124-1.537l.186-.183c.291.001 1.831.055 3.479 1.26 0 0 1.844 3.15 1.844 7.02-.061-.074-1.144 1.666-3.931 1.726 0 0-.472-.534-.808-1 1.63-.468 2.24-1.404 2.24-1.404-.535.337-1.023.537-1.419.737-.609.268-1.219.4-1.828.535-2.884.468-4.503-.315-6.033-.936l-.523-.266s.609.936 2.174 1.404c-.411.469-.818 1.002-.818 1.002-2.786-.066-3.802-1.806-3.802-1.806 0-3.876 1.833-7.02 1.833-7.02z"></path><path d="m14.308 12.771c.711 0 1.29-.6 1.29-1.34 0-.735-.576-1.335-1.29-1.335v.003c-.708 0-1.288.598-1.29 1.338 0 .734.579 1.334 1.29 1.334z"></path><path d="m9.69 12.771c.711 0 1.29-.6 1.29-1.34 0-.735-.575-1.335-1.286-1.335l-.004.003c-.711 0-1.29.598-1.29 1.338 0 .734.579 1.334 1.29 1.334z"></path></g></svg>
            </a>

            <a class="mr-3 hover:text-rose-800"
            href="https://www.linkedin.com/company/nftfactory"
            target="_blank" 
            rel="noopener noreferrer">
              <svg class="fill-current w-5 h-5" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" x="0" y="0" viewBox="0 0 24 24" xml:space="preserve"><g><path d="m23.994 24v-.001h.006v-8.802c0-4.306-.927-7.623-5.961-7.623-2.42 0-4.044 1.328-4.707 2.587h-.07v-2.185h-4.773v16.023h4.97v-7.934c0-2.089.396-4.109 2.983-4.109 2.549 0 2.587 2.384 2.587 4.243v7.801z" ></path><path d="m.396 7.977h4.976v16.023h-4.976z"></path><path d="m2.882 0c-1.591 0-2.882 1.291-2.882 2.882s1.291 2.909 2.882 2.909 2.882-1.318 2.882-2.909c-.001-1.591-1.292-2.882-2.882-2.882z"></path></g></svg>
            </a>
          </div>
           
        </div>
      </div>
      <!-- / toggle menu -->
      <!-- / show menu sm,md -->
  </nav>

  <div class="mx-auto pt-32 px-4 lg:container xl:max-w-screen-lg">
    <h1 class="text-3xl sm:text-3xl md:text-5xl lg:text-7xl font-semibold  text-NFTF-green italic">
        Expositions
    </h1>
    <address class="not-italic font-semibold uppercase text-xl">
        <span class="mr-1 inline-block text-NFTF-green">
            <svg class="h-4 fill-current" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" x="0" y="0" viewBox="0 0 64 64" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><g id="Pin"><path d="m32 0a24.0319 24.0319 0 0 0 -24 24c0 17.23 22.36 38.81 23.31 39.72a.99.99 0 0 0 1.38 0c.95-.91 23.31-22.49 23.31-39.72a24.0319 24.0319 0 0 0 -24-24zm0 35a11 11 0 1 1 11-11 11.0066 11.0066 0 0 1 -11 11z" ></path></g></g></svg>
        </span>
        NFT Factory - 
        <a class="underline"
        href="https://www.google.com/maps/place/137+Rue+Saint-Martin,+75004+Paris/@48.8610951,2.3514079,17z/data=!4m5!3m4!1s0x47e66e1bf7ec46db:0xc5b1e5d3b81504fd!8m2!3d48.8611923!4d2.3512499?hl=fr-FR"
        target="_blank"
        rel="noopener noreferrer">
            137 rue saint-Martin 75004 Paris, France
        </a>
    </address>
  </div>

  <div class="mx-auto py-5 px-4 lg:max-w-screen-lg text-xl">
      <main id="content" class="py-10 sm:columns-2 gap-8">
        Pas d'expo ouvertes
      </main>
  </div>

  <footer class="bg-NFTF-green h-5"></footer>
</x-guest-layout>