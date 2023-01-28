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
        Ça sent le crypto-sapin
    </h1>
    <p class="mt-4 font-black uppercase text-xl leading-none">
        <span class="mr-1 inline-block text-NFTF-green">
            <svg class="h-4 fill-current" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" x="0" y="0" viewBox="0 0 34 34" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><g><path d="m29.6 2h-3v3c0 .6-.5 1-1 1s-1-.4-1-1v-3h-16v3c0 .6-.5 1-1 1s-1-.4-1-1v-3h-3c-1.5 0-2.6 1.3-2.6 3v3.6h32v-3.6c0-1.7-1.8-3-3.4-3zm-28.6 8.7v18.3c0 1.8 1.1 3 2.7 3h26c1.6 0 3.4-1.3 3.4-3v-18.3zm8.9 16.8h-2.4c-.4 0-.8-.3-.8-.8v-2.5c0-.4.3-.8.8-.8h2.5c.4 0 .8.3.8.8v2.5c-.1.5-.4.8-.9.8zm0-9h-2.4c-.4 0-.8-.3-.8-.8v-2.5c0-.4.3-.8.8-.8h2.5c.4 0 .8.3.8.8v2.5c-.1.5-.4.8-.9.8zm8 9h-2.5c-.4 0-.8-.3-.8-.8v-2.5c0-.4.3-.8.8-.8h2.5c.4 0 .8.3.8.8v2.5c0 .5-.3.8-.8.8zm0-9h-2.5c-.4 0-.8-.3-.8-.8v-2.5c0-.4.3-.8.8-.8h2.5c.4 0 .8.3.8.8v2.5c0 .5-.3.8-.8.8zm8 9h-2.5c-.4 0-.8-.3-.8-.8v-2.5c0-.4.3-.8.8-.8h2.5c.4 0 .8.3.8.8v2.5c0 .5-.3.8-.8.8zm0-9h-2.5c-.4 0-.8-.3-.8-.8v-2.5c0-.4.3-.8.8-.8h2.5c.4 0 .8.3.8.8v2.5c0 .5-.3.8-.8.8z"></path></g></g></svg>
        </span>
        Du jeudi 15 décembre 2022 au dimanche 15 janvier 2023
    </p>
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
      
  <div class="pt-3 pb-5">
      <p class="mx-auto py-5 px-4 lg:container xl:max-w-screen-lg text-gray-800 leading-5 md:columns-2">
          Le marché des NFTs et des crypto-monnaies, en berne depuis plus d’un an, continue de plonger à la veille des fêtes de fin d’année, notamment avec la faillite récente de la société FTX et ses conséquences.<br>
          <br>
          Celles et ceux qui avaient confié leurs fonds à cet acteur hyper-centralisé ont perdu gros et cet événement est souvent décrit comme la plus grande fraude financière de l’histoire de l’humanité, surpassant la fameuse affaire Madoff.<br>
          <br>
          Alors que les crypto-sceptiques s'emparent de cette actualité douloureuse pour prédire la mort des crypto-monnaies et que les régulateurs y voient une opportunité d’intensifier le contrôle de ce nouvel espace de liberté qui leur échappe, on peut le dire : “ça sent le crypto-sapin”.<br>
          Pourtant, les crypto-artistes ont un point de vue différent.<br>
          <br>
          La centralisation dont la faillite de FTX est le symbole, comme la régulation à l’excès qui risque d’en résulter, sont à l’opposé des valeurs qu’ils et elles défendent. L’enterrement des crypto-monnaies, quant à lui, a trop souvent été annoncé pour être encore crédible.<br>
          <br>
          Les crypto-artistes expriment donc ici un double message : en pratiquant l'autodérision au sujet des excès et dérives mortifères de l’espace dans lequel ils et elles évoluent, ils et elles critiquent de façon subtile les systèmes centralisés et le capitalisme de surveillance pour qui, en effet... “ça sent le sapin” !
      </p>
  </div>

  <div class="mx-auto py-5 px-4 lg:max-w-screen-lg text-xl">
      <main id="content" class="py-10 sm:columns-2 gap-8">

      </main>
  </div>

  <footer class="bg-NFTF-green h-5"></footer>

  <script>

    const data = [
    {
        "artiste": "abysms",
        "titre": "rekt christmas",
        "twitter": "@abysms11",
        "format": "MP4",
        "blockchain": "Ethereum",
        "ed": 25,
        "eth": 0.025,
        "coin": "ETH",
        "eur": 33,
        "screen": "E3",
        "qrCodeLinkToBuyPage": "https://knownorigin.io/gallery/26055000-rekt-christmas",
        "fileForDisplay": "https://drive.google.com/drive/folders/1jamqQkWABODXiP_iMPNsYLhrpxSO3LeW",
        "valueEth": 0.625,
        "artworkFileName": "wrekt_christmas_editionsize_25.mov"
    },
    {
        "artiste": "Albertine Meunier",
        "titre": "A crypto angel at my table",
        "twitter": "@albertinmeunier",
        "format": "PNG",
        "blockchain": "Ethereum",
        "ed": 1,
        "eth": 0.777,
        "coin": "ETH",
        "eur": 1025.64,
        "screen": "H9",
        "qrCodeLinkToBuyPage": "https://superrare.com/artwork-v2/a-crypto-angel-at-my-table-41159",
        "fileForDisplay": "https://drive.google.com/drive/folders/19Ffva-nlhRxGjRaeZqAfeRzvvDWa35kH",
        "valueEth": 0.777,
        "artworkFileName": "albertine_meunier_A Crypt Angel At My Table.png"
    },
    {
        "artiste": "Angie Taylor",
        "titre": "rESurReKt",
        "twitter": "@theAngieTaylor",
        "format": "MP4",
        "blockchain": "Ethereum",
        "ed": 13,
        "eth": 0.2512,
        "coin": "ETH",
        "eur": 1617.0000000000002,
        "screen": "D10",
        "qrCodeLinkToBuyPage": "https://angietayloreditions.wlbl.xyz/token/ETHEREUM:0x29f0caae93d8c236069aaebb988779373b369c7b:1",
        "fileForDisplay": "https://drive.google.com/drive/folders/1MJwfZhwWjxSFO8VPnOqnzvouxSMoVd2m",
        "valueEth": 15.925,
        "artworkFileName": "rESurREKt.mp4"
    },
    {
        "artiste": "Anne Spalter",
        "titre": "Crypto Rabbit Is Coming To Town",
        "twitter": "@annespalter",
        "format": "JPEG",
        "blockchain": "Ethereum",
        "ed": 1,
        "eth": 0.515,
        "coin": "ETH",
        "eur": 679.8000000000001,
        "screen": "D2",
        "qrCodeLinkToBuyPage": "https://superrare.com/artwork-v2/crypto-rabbit-is-coming-to-town-41121",
        "fileForDisplay": "https://drive.google.com/drive/folders/1118J_cfs1Qo6TJcl8kuD2lq1Kqd2Xl9y",
        "valueEth": 0.515,
        "artworkFileName": "Crypto-Rabbit_Spalter.jpg"
    },
    {
        "artiste": "Bård Ionson",
        "titre": "THE DANCE",
        "twitter": "@bardionson",
        "format": "MP4",
        "blockchain": "Ethereum",
        "ed": 1,
        "eth": 2.521,
        "coin": "ETH",
        "eur": 3327.72,
        "screen": "I1",
        "qrCodeLinkToBuyPage": "https://gallery.manifold.xyz/tDance",
        "fileForDisplay": "https://drive.google.com/drive/folders/1_Ktv0vsFo9nJQ2rPP2ro77XW4teybvDy",
        "valueEth": 2.521,
        "artworkFileName": "TheDance.mp4"
    },
    {
        "artiste": "Benjamin Bardou",
        "titre": "NO MORE GIFTS, KIDS!",
        "twitter": "@benjaminbardou",
        "format": "JPEG",
        "blockchain": "Ethereum",
        "ed": 25,
        "eth": 0.25,
        "coin": "ETH",
        "eur": 330,
        "screen": "B1",
        "qrCodeLinkToBuyPage": "https://www.curate.page/t/benjaminbardou",
        "fileForDisplay": "https://drive.google.com/drive/folders/1Z3JPKjPW724-JQT2gNUjF-rk38fEOTte",
        "valueEth": 6.25,
        "artworkFileName": "No More Gifts, Kids!.png"
    },
    {
        "artiste": "Booyasan",
        "titre": "An Ape in winter",
        "twitter": "@alexb_twitt",
        "format": "MP4",
        "blockchain": "Ethereum",
        "ed": 12,
        "eth": 0.21,
        "coin": "ETH",
        "eur": 277.2,
        "screen": "C2",
        "qrCodeLinkToBuyPage": "https://knownorigin.io/gallery/25904000-an-ape-in-winter",
        "fileForDisplay": "https://drive.google.com/drive/folders/1RYaKNXIz2MJM7kV_0qWtC8sWEKu5sHil",
        "valueEth": 2.52,
        "artworkFileName": "1_BOOYASAN APE 4K H265.mp4"
    },
    {
        "artiste": "CEGZ.project",
        "titre": "Manzoni Tree",
        "twitter": "@CegzProject",
        "format": "MP4",
        "blockchain": "Ethereum",
        "ed": 25,
        "eth": "0,1225",
        "coin": "ETH",
        "eur": 161.7,
        "screen": "Tr4",
        "qrCodeLinkToBuyPage": "https://manzonitree.wlbl.xyz",
        "fileForDisplay": "https://drive.google.com/drive/folders/18XjxU_yqabY5FsO8RyQORmzEbz49HVpc",
        "valueEth": 3.0625,
        "artworkFileName": "CEGZ_project_MANZONI_TREE_CA-SENT-LE-SAPIN-4K.mp4"
    },
    {
        "artiste": "CryptoClay",
        "titre": "SBF XIV - The official portrait",
        "twitter": "@CryptoClayArt",
        "format": "MP4",
        "blockchain": "Ethereum",
        "ed": 25,
        "eth": 0.1225,
        "coin": "ETH",
        "eur": 161.7,
        "screen": "I6",
        "qrCodeLinkToBuyPage": "https://cryptoclayart.wlbl.xyz/explore/ETHEREUM:0xffc66a5fc65f8595f8e3b1d983a1ca0cac56be82",
        "fileForDisplay": "https://drive.google.com/drive/folders/1ZmHd_u1a7tEVyPU2GZ5KTZjmxKHIkJr5",
        "valueEth": 3.0625,
        "artworkFileName": "cryptoclay_SBFXIV.mp4"
    },
    {
        "artiste": "CypherpunkNow",
        "titre": "FOMOFUD",
        "twitter": "@cypherpunknow",
        "format": "MP4",
        "blockchain": "Ethereum",
        "ed": 1,
        "eth": 2.512,
        "coin": "ETH",
        "eur": 3315.84,
        "screen": "Tr6",
        "qrCodeLinkToBuyPage": "https://gallery.manifold.xyz/FOMOFUD",
        "fileForDisplay": "https://drive.google.com/drive/folders/1JXvnRLS1joGSTYtPXD3IQwseFjKDikUC",
        "valueEth": 2.512,
        "artworkFileName": "FOMO-FUD-cycle-LARGE-FIN.mp4"
    },
    {
        "artiste": "Fabiano Speziari",
        "titre": "Clod 153: Bear Hotel",
        "twitter": "@fabianospeziari",
        "format": "MP4",
        "blockchain": "Ethereum",
        "ed": 25,
        "eth": 0.07521,
        "coin": "ETH",
        "eur": 99.2772,
        "screen": "H5",
        "qrCodeLinkToBuyPage": "https://knownorigin.io/gallery/25868000-clod-153-bear-hotel",
        "fileForDisplay": "https://drive.google.com/drive/folders/1BonIO50RASPb6vxU1zLKAeFghtolaau8",
        "valueEth": 1.88025,
        "artworkFileName": "zolla_153_1920x1080.mp4"
    },
    {
        "artiste": "FARAH",
        "titre": "Hubris & Ponzi",
        "twitter": "@farah_artdesign",
        "format": "MP4",
        "blockchain": "Ethereum",
        "ed": 12,
        "eth": 0.251,
        "coin": "ETH",
        "eur": 331.32,
        "screen": "Tr3",
        "qrCodeLinkToBuyPage": "https://knownorigin.io/gallery/26083000-hubris-and-ponzi",
        "fileForDisplay": "https://drive.google.com/drive/folders/1_G7u76urELjWKTDK239fzrthOgIQvwxh",
        "valueEth": 3.012,
        "artworkFileName": "Hubris_&_Ponzi_NEWERAcollection_FARAH.mp4"
    },
    {
        "artiste": "GISELXFLOREZ",
        "titre": "Glitter of Hard Knocks",
        "twitter": "@GiselFlorez",
        "format": "JPEG",
        "blockchain": "Ethereum",
        "ed": 1,
        "eth": 3,
        "coin": "ETH",
        "eur": 3960,
        "screen": "E2",
        "qrCodeLinkToBuyPage": "https://superrare.com/0x8740eef45def23a94bed5b9793c6d1a9b7dc1ebf/glitter-of-hard-knocks-5",
        "fileForDisplay": "https://drive.google.com/drive/folders/1BV8vYFqWJ-0nAGSc0TKyiQFgsWd6WuND",
        "valueEth": 3,
        "artworkFileName": "TransmissionsofLight_crop_-1110070-2GlitterOfHardRocks copy.jpg"
    },
    {
        "artiste": "Ina Vare",
        "titre": "Molly Jolly Christmas",
        "twitter": "@ina_vare",
        "format": "MP4",
        "blockchain": "Ethereum",
        "ed": 12,
        "eth": 0.2512,
        "coin": "ETH",
        "eur": 331.58399999999995,
        "screen": "D4",
        "qrCodeLinkToBuyPage": "https://nftfactory.inavare.xyz/",
        "fileForDisplay": "https://drive.google.com/drive/folders/1IOV-HEK82x4kqlIsmiIT8ow-zULeobBy",
        "valueEth": 3.0143999999999997,
        "artworkFileName": "INA-VARE-Molly-Jolly-Christmas-2022.mp4"
    },
    {
        "artiste": "Ivona Tau",
        "titre": "L'HIVER CRYPTO",
        "twitter": "@ivonatau",
        "format": "MP4",
        "blockchain": "Ethereum",
        "ed": 12,
        "eth": 0.25,
        "coin": "ETH",
        "eur": 330,
        "screen": "F1",
        "qrCodeLinkToBuyPage": "https://app.manifold.xyz/c/tau",
        "fileForDisplay": "https://drive.google.com/drive/folders/1yVoPtNNb1muOTKQB662N6gJP2AXVlKi7",
        "valueEth": 3,
        "artworkFileName": "L'hiver crypto.mp4"
    },
    {
        "artiste": "jivinci",
        "titre": "Tree Of Provenance",
        "twitter": "@jivdontexist",
        "format": "MP4",
        "blockchain": "Ethereum",
        "ed": 10,
        "eth": 0.45,
        "coin": "ETH",
        "eur": 594,
        "screen": "F3",
        "qrCodeLinkToBuyPage": "https://www.curate.page/t/treeofprovenance",
        "fileForDisplay": "https://drive.google.com/drive/folders/1l-KJmYEy3a8h9C2ACzjMzwZrn7vQsPxc",
        "valueEth": 4.5,
        "artworkFileName": "TreeOfProvenance-Paris.mp4"
    },
    {
        "artiste": "Jonas Kasper Jensen",
        "titre": "DARK AGE",
        "twitter": "@jonaskasperjens",
        "format": "MP4",
        "blockchain": "Ethereum",
        "ed": 10,
        "eth": 0.1,
        "coin": "ETH",
        "eur": 132,
        "screen": "C3",
        "qrCodeLinkToBuyPage": "https://www.curate.page/t/DARKAGE",
        "fileForDisplay": "https://drive.google.com/drive/folders/1IxsuSQHdTs5CutOxhWLY3G05rXXfujcQ",
        "valueEth": 1,
        "artworkFileName": "DARK AGE VIDEO.mp4"
    },
    {
        "artiste": "Kibo",
        "titre": "GIVING TREE",
        "twitter": "@kibodesigns",
        "format": "MP4",
        "blockchain": "Ethereum",
        "ed": 12,
        "eth": 0.1225,
        "coin": "ETH",
        "eur": 161.7,
        "screen": "H1",
        "qrCodeLinkToBuyPage": "https://www.curate.page/t/givingtree",
        "fileForDisplay": "https://drive.google.com/drive/folders/1SSq3Tuclj16BqlS0_vY81c8RlngS245y",
        "valueEth": 1.47,
        "artworkFileName": "giving tree.mp4"
    },
    {
        "artiste": "Louis-Paul Caron",
        "titre": "Joyeux Noël",
        "twitter": "@LouisPaulCaron",
        "format": "MP4",
        "blockchain": "Ethereum",
        "ed": 1,
        "eth": 1.225,
        "coin": "ETH",
        "eur": 1617.0000000000002,
        "screen": "H4",
        "qrCodeLinkToBuyPage": "https://knownorigin.io/gallery/25863000-joyeux-noel",
        "fileForDisplay": "https://drive.google.com/drive/folders/1w1lVGEMXsZloB8Z_Uov2Mwg1iQ35Em0L",
        "valueEth": 1.225,
        "artworkFileName": "Joyeux_Noel_Louis-Paul_Caron_2022.mp4"
    },
    {
        "artiste": "luluxxx",
        "titre": "S(UBJ(ECT)I)F. LULUXXX",
        "twitter": "@luluixixix",
        "format": "GIF",
        "blockchain": "Ethereum",
        "ed": 12,
        "eth": 0.1225,
        "coin": "ETH",
        "eur": 161.7,
        "screen": "I5",
        "qrCodeLinkToBuyPage": "https://app.manifold.xyz/c/subjectif",
        "fileForDisplay": "https://drive.google.com/drive/folders/1LNr3ipx1QVRN1BtB_cklyCoJ1DxSXYnp",
        "valueEth": 1.47,
        "artworkFileName": "luluxxx_loop_compressed_1080x1920.mp4"
    },
    {
        "artiste": "Magda Americangangsta",
        "titre": "O Holy Night",
        "twitter": "@MagdaGangsta",
        "format": "JPEG",
        "blockchain": "Ethereum",
        "ed": 1,
        "eth": 0.3,
        "coin": "ETH",
        "eur": 396,
        "screen": "I2",
        "qrCodeLinkToBuyPage": "https://foundation.app/@MagdaGangsta/life-4c63/2?ref=0xDA47a6B9EC624F9d8cfE1db6423A26CBEbc1246D",
        "fileForDisplay": "https://drive.google.com/drive/folders/1PUueBHpTWvwonuTlBeLehw1A88bryiUd",
        "valueEth": 0.3,
        "artworkFileName": "O Holy Night .jpg"
    },
    {
        "artiste": "Marine Bléhaut",
        "titre": "All Is Serene",
        "twitter": "@m_blehaut",
        "format": "MP4",
        "blockchain": "Ethereum",
        "ed": 12,
        "eth": 0.2512,
        "coin": "ETH",
        "eur": 331.58399999999995,
        "screen": "D11",
        "qrCodeLinkToBuyPage": "https://www.curate.page/t/all-is-serene",
        "fileForDisplay": "https://drive.google.com/drive/folders/1ZJeq3faBAb9fTQHDc4tZwCEiRkKRed89",
        "valueEth": 3.0143999999999997,
        "artworkFileName": "All is serene.mp4"
    },
    {
        "artiste": "Mattia Cuttini",
        "titre": "Produkt Hi-res-53 Animated 3D",
        "twitter": "@MattiaC",
        "format": "MP4",
        "blockchain": "Ethereum",
        "ed": 20,
        "eth": 0.2512,
        "coin": "ETH",
        "eur": 331.58399999999995,
        "screen": "Pal2",
        "qrCodeLinkToBuyPage": "https://www.curate.page/t/produkt53",
        "fileForDisplay": "https://drive.google.com/drive/folders/1q_S4X6v9El2q0AjamLooilny5KyCF5vG",
        "valueEth": 5.023999999999999,
        "artworkFileName": "Produkt53_Mattia_Cuttini_2022_1920x1920(2).mp4"
    },
    {
        "artiste": "Max Capacity",
        "titre": "MMXXII",
        "twitter": "@maxcapacity",
        "format": "MP4",
        "blockchain": "Ethereum",
        "ed": 12,
        "eth": 0.1225,
        "coin": "ETH",
        "eur": 161.7,
        "screen": "F2",
        "qrCodeLinkToBuyPage": "https://app.manifold.xyz/c/MMXXII",
        "fileForDisplay": "https://drive.google.com/drive/folders/1kMGi_tNd8k963UWQENq_I6WdlNUM1s6S",
        "valueEth": 1.47,
        "artworkFileName": "MAX CAPACITY 4K Rotated Right-1.mp4"
    },
    {
        "artiste": "Max Osiris",
        "titre": "///₩⊕LF///T⊕tΞᘉ///",
        "twitter": "@maxosirisart",
        "format": "JPEG",
        "blockchain": "Ethereum",
        "ed": 10,
        "eth": 0.337,
        "coin": "ETH",
        "eur": 444.84000000000003,
        "screen": "Tr5",
        "qrCodeLinkToBuyPage": "https://knownorigin.io/gallery/26026000-lf-t-t-ks",
        "fileForDisplay": "https://drive.google.com/drive/folders/12ZHmKrAwRpDi_ntNgUAR8_AiqIOIaJ_S",
        "valueEth": 3.37,
        "artworkFileName": "wolf-totem-2022.jpg"
    },
    {
        "artiste": "Mera Takeru",
        "titre": "CRYPTO ART NEVER DIES",
        "twitter": "@mera_takeru",
        "format": "MP4",
        "blockchain": "Ethereum",
        "ed": 12,
        "eth": 0.1225,
        "coin": "ETH",
        "eur": 161.7,
        "screen": "C1",
        "qrCodeLinkToBuyPage": "https://www.curate.page/t/CAND",
        "fileForDisplay": "https://drive.google.com/drive/folders/1YkRfJE5tsowCU-OXekELnqP4Y4UCRTuh",
        "valueEth": 1.47,
        "artworkFileName": "Crypto art never dies.mp4"
    },
    {
        "artiste": "Mighty Moose",
        "titre": "I fell into gains and now I’m REKT",
        "twitter": "@mightymooseart",
        "format": "MP4",
        "blockchain": "Ethereum",
        "ed": 1,
        "eth": 1,
        "coin": "ETH",
        "eur": 1320,
        "screen": "Tr1",
        "qrCodeLinkToBuyPage": "https://rarible.com/token/0x886b4adbe520780ce457519196d6c4c826ab748b:4?tab=overview",
        "fileForDisplay": "https://drive.google.com/drive/folders/1Q7mj37lxjmj23WJomOtyEASvCGaFVVcr",
        "valueEth": 1,
        "artworkFileName": "I fell into gains and now I'm REKT.mp4"
    },
    {
        "artiste": "Neil Beloufa",
        "titre": "Cheat island",
        "twitter": "@neilbeloufa",
        "format": "MP4",
        "blockchain": "Ethereum",
        "ed": 12,
        "eth": 0.25,
        "coin": "ETH",
        "eur": 330,
        "screen": "H7",
        "qrCodeLinkToBuyPage": "https://ebb.global/cheat_island/",
        "fileForDisplay": "https://drive.google.com/drive/folders/1zzUzeuWgNMFBilI3PPcb3Qg0BJzU2jz_",
        "valueEth": 3,
        "artworkFileName": "NFT_cheatbeach.mp4"
    },
    {
        "artiste": "Oficinas TK",
        "titre": "A Winter Solstice New Moon",
        "twitter": "@oficinastk",
        "format": "MP4",
        "blockchain": "Ethereum",
        "ed": 12,
        "eth": 0.21,
        "coin": "ETH",
        "eur": 277.2,
        "screen": "D9",
        "qrCodeLinkToBuyPage": "https://otkmultimint.wlbl.xyz/",
        "fileForDisplay": "https://drive.google.com/drive/folders/1dMiRBwvAcVmbg_3MRYY5t_s_hx47PmIe",
        "valueEth": 2.52,
        "artworkFileName": "A Winter Solstice New Moon.mp4"
    },
    {
        "artiste": "Pierre Pauze",
        "titre": "MDMA.JPG",
        "twitter": "@PauzePierre",
        "format": "JPEG",
        "blockchain": "Ethereum",
        "ed": 12,
        "eth": 0.123,
        "coin": "ETH",
        "eur": 162.35999999999999,
        "screen": "Pal1",
        "qrCodeLinkToBuyPage": "https://www.curate.page/t/MDMA",
        "fileForDisplay": "https://drive.google.com/drive/folders/1RI2FjQvccBqBO0lANRvy38ErVynNZz5v",
        "valueEth": 1.476,
        "artworkFileName": "MDMA.jpg"
    },
    {
        "artiste": "RYR",
        "titre": "Ma$ter of Puppet$",
        "twitter": "@ryrartist",
        "format": "PNG",
        "blockchain": "Ethereum",
        "ed": 10,
        "eth": 0.125,
        "coin": "ETH",
        "eur": 165,
        "screen": "H6",
        "qrCodeLinkToBuyPage": "https://rarible.com/token/0xb66a603f4cfe17e3d27b87a8bfcad319856518b8:49875316573949350974924991904869366024063340130993919443866124999500389941249?tab=overview",
        "fileForDisplay": "https://drive.google.com/drive/folders/1qPQiXEudH8kGFsOf6JT60bGPGst3-hV1",
        "valueEth": 1.25,
        "artworkFileName": "MasterOfPuppets1.1.png"
    },
    {
        "artiste": "Shortcut",
        "titre": "THE CRYPTO SIREN",
        "twitter": "@unityofmulti",
        "format": "MP4",
        "blockchain": "Ethereum",
        "ed": 1,
        "eth": 1,
        "coin": "ETH",
        "eur": 1320,
        "screen": "I3",
        "qrCodeLinkToBuyPage": "https://gallery.manifold.xyz/crypto-siren",
        "fileForDisplay": "https://drive.google.com/drive/folders/1Vc8W1DfCH0dOd67uN0uigEfIJDxBU_Rk",
        "valueEth": 1,
        "artworkFileName": "Crypto_Siren.mp4"
    },
    {
        "artiste": "Skeenee",
        "titre": "RIP",
        "twitter": "@skeenee_art",
        "format": "MP4",
        "blockchain": "Ethereum",
        "ed": 24,
        "eth": 0.06,
        "coin": "ETH",
        "eur": 79.2,
        "screen": "Tr10",
        "qrCodeLinkToBuyPage": "https://gallery.manifold.xyz/0xbdcca6309bf169f96e53ee73390dc14ab03dade5/1",
        "fileForDisplay": "https://drive.google.com/drive/u/1/folders/10GlEHZVeaizn6hgfx79KVSOLQ1048oAZ",
        "valueEth": 1.44,
        "artworkFileName": "RIP.mp4"
    },
    {
        "artiste": "Stellabelle",
        "titre": "BACCHANALIA",
        "twitter": "@stellabelle",
        "format": "PNG",
        "blockchain": "Ethereum",
        "ed": 12,
        "eth": 0.1225,
        "coin": "ETH",
        "eur": 161.7,
        "screen": "Tr2",
        "qrCodeLinkToBuyPage": "https://www.curate.page/t/nftfactorystellabelle",
        "fileForDisplay": "https://drive.google.com/drive/folders/1P65YfDt0b9wvpIv5rO4Xq0vFmIU0Yk3n",
        "valueEth": 1.47,
        "artworkFileName": "Bacchanalia.png"
    },
    {
        "artiste": "Stephan Breuer",
        "titre": "Sūblîme Trînity ^",
        "twitter": "@stephanbreuer1",
        "format": "MP4",
        "blockchain": "Ethereum",
        "ed": 1,
        "eth": 2.512,
        "coin": "ETH",
        "eur": 3315.84,
        "screen": "I4",
        "qrCodeLinkToBuyPage": "https://www.amormundi.io/nftfactory",
        "fileForDisplay": "https://drive.google.com/drive/folders/16MfW5Em4tAmoAmxKdXsJgjvl5imcEOOw",
        "valueEth": 2.512,
        "artworkFileName": "sublime trinity.mp4"
    },
    {
        "artiste": "Systaime",
        "titre": "CRYPT0 S4p¡N",
        "twitter": "@Systaime18",
        "format": "MP4",
        "blockchain": "Ethereum",
        "ed": 1,
        "eth": 1,
        "coin": "ETH",
        "eur": 1320,
        "screen": "H3",
        "qrCodeLinkToBuyPage": "https://opensea.io/assets/ethereum/0x495f947276749ce646f68ac8c248420045cb7b5e/98007087554171724001958998399381536148354175405894556926127103695815954137089",
        "fileForDisplay": "https://drive.google.com/drive/folders/1qM_tAiQWMnSh2ldzeoyXcisoApED7APS",
        "valueEth": 1,
        "artworkFileName": "SAPIN-SYSTAIME.mp4"
    },
    {
        "artiste": "Teto",
        "titre": "LOSSES",
        "twitter": "@tetonotsorry",
        "format": "MP4",
        "blockchain": "Ethereum",
        "ed": "Open",
        "eth": 0.05,
        "coin": "ETH",
        "eur": 66,
        "screen": "Tr7",
        "qrCodeLinkToBuyPage": "https://app.manifold.xyz/c/losses",
        "fileForDisplay": "https://drive.google.com/drive/folders/1nfwdSt5CV2mQjRd3wNwda8Z0nNXU28BN",
        "valueEth": 0,
        "artworkFileName": "Losses.mp4"
    },
    {
        "artiste": "theYRDGZ",
        "titre": "Ghost of Markets Present",
        "twitter": "@theYRDGZ",
        "format": "JPEG",
        "blockchain": "Ethereum",
        "ed": 12,
        "eth": 0.1225,
        "coin": "ETH",
        "eur": 161.7,
        "screen": "E4",
        "qrCodeLinkToBuyPage": "https://rarible.com/collection/0xef7e00ac59836aa8fdb7051fa874eb29c911c809/items",
        "fileForDisplay": "https://drive.google.com/drive/folders/1vznBqe0imvRkPDVlYaFQ5DYsAzPC7liq",
        "valueEth": 1.47,
        "artworkFileName": "_theYRDGZ.jpg"
    },
    {
        "artiste": "Touky 333",
        "titre": "You successfuly bouht low effort think",
        "twitter": "@touky333",
        "format": "JPEG",
        "blockchain": "Ethereum",
        "ed": 12,
        "eth": 0.25,
        "coin": "ETH",
        "eur": 330,
        "screen": "H8",
        "qrCodeLinkToBuyPage": "https://opensea.io/collection/crypto-sapin-with-nft-factory",
        "fileForDisplay": "https://drive.google.com/drive/folders/1Q7pa2v8H6r7I2JUeT_1MOK8bHnbRze3f",
        "valueEth": 3,
        "artworkFileName": "25ok.jpg"
    },
    {
        "artiste": "URBANDRONE",
        "titre": "STASIS",
        "twitter": "@urbandrone_",
        "format": "MP4",
        "blockchain": "Tezos",
        "ed": 30,
        "eth": 150,
        "coin": "TZ",
        "eur": 145.5,
        "screen": "E1",
        "qrCodeLinkToBuyPage": "https://objkt.com/collection/KT1KqEW3YSpfPD2DgnLXTesiqYdHRqLrskNm",
        "fileForDisplay": "https://drive.google.com/drive/folders/1YilSc7QwbPz9U5DAUnTIUVNDg2madYyJ",
        "valueEth": 0,
        "valueTz": 4500,
        "artworkFileName": "Stasis.mp4"
    },
    {
        "artiste": "XERAK",
        "titre": "HELLO CRYPTO SAPIN",
        "twitter": "@presidentmutant",
        "format": "MP4",
        "blockchain": "Ethereum",
        "ed": 12,
        "eth": 0.25,
        "coin": "ETH",
        "eur": 330,
        "screen": "G1",
        "qrCodeLinkToBuyPage": "https://knownorigin.io/gallery/25805000",
        "fileForDisplay": "https://drive.google.com/drive/folders/1btDFSZL3FXM7N96NRf7_s8guHX-ceJDp",
        "valueEth": 3,
        "artworkFileName": "XERAK_Hello-Crypto-Sapin.mp4"
    },
    {
        "artiste": "Yura Miron",
        "titre": "The Great Bliss",
        "twitter": "@YuraMironArt",
        "format": "PNG",
        "blockchain": "Ethereum",
        "ed": 12,
        "eth": 0.125,
        "coin": "ETH",
        "eur": 165,
        "screen": "D12",
        "qrCodeLinkToBuyPage": "https://opensea.io/collection/yura-miron-x-nft-factory-paris",
        "fileForDisplay": "https://drive.google.com/drive/folders/1l8p8r93pcR7ukkv8-ulVa8RWSv5afmb6",
        "valueEth": 1.5,
        "artworkFileName": "The Great Bliss.png"
    },
    {
        "artiste": "Abdoulaye Barry",
        "titre": "Crush and burn",
        "twitter": "@BarryPixel2chop",
        "format": "MP4",
        "blockchain": "Ethereum",
        "ed": 1,
        // "eth": 0.28,
        "eth": 0,
        "coin": "ETH",
        "eur": 369.6,
        "screen": "D7",
        "qrCodeLinkToBuyPage": "https://ninfa.io/nft/@Abdoulaye/Crush-and-burn-529",
        "fileForDisplay": "https://drive.google.com/drive/folders/1irn7gUsaiaqoMECpIQWVTQpxb0_q3hJ5",
        "valueEth": 0.28,
        "artworkFileName": "Crush and burn.mp4"
    },
    {
        "artiste": "crashblossom",
        "titre": "6X",
        "twitter": "@crashblossom1",
        "format": "MP4",
        "blockchain": "Ethereum",
        "ed": 12,
        // "eth": 0.12,
        "eth": 0,
        "coin": "ETH",
        "eur": 158.4,
        "screen": "H2",
        "qrCodeLinkToBuyPage": "https://rarible.com/collection/0xeea24ab418baf0d9ca9358f0f59b16b2dcd63f7f/items",
        "fileForDisplay": "https://drive.google.com/drive/folders/1NhYv6ubr_84YnoBI476Nvrxhywbd7pxW",
        "valueEth": 1.44,
        "artworkFileName": "6X.mp4"
    },
    {
        "artiste": "FelixFelixfelix",
        "titre": "SHITCOIN SISYPHUS",
        "twitter": "@I____felix____I",
        "format": "MP4",
        "blockchain": "Ethereum",
        "ed": 12,
        // "eth": 0.25,
        "eth": 0,
        "coin": "ETH",
        "eur": 330,
        "screen": "D5",
        "qrCodeLinkToBuyPage": "https://www.curate.page/t/felixfelixfelix-shitcoin-sisyphus",
        "fileForDisplay": "https://drive.google.com/drive/u/1/folders/1JecbflPVpkA0kVUfGNSt-ni7tocUTekv",
        "valueEth": 3,
        "artworkFileName": "FelixFelixFelix.mp4"
    },
    {
        "artiste": "Stina Jones",
        "titre": "SPROUT",
        "twitter": "@stina_jones",
        "format": "PNG",
        "blockchain": "Ethereum",
        "ed": 12,
        // "eth": 0.1225,
        "eth": 0,
        "coin": "ETH",
        "eur": 161.7,
        "screen": "D6",
        "qrCodeLinkToBuyPage": "https://app.manifold.xyz/c/sprout",
        "fileForDisplay": "https://drive.google.com/drive/folders/1E9XT456--fyYhp-YkyUtCVIYRtJGT0Xp",
        "valueEth": 1.47,
        "artworkFileName": "Sprout_SJ.png"
    },
    {
        "artiste": "charlesai",
        "titre": "THE STATE OF CRYPTO CHRISTMAS",
        "twitter": "@HODLFrance",
        "format": "PNG",
        "blockchain": "Ethereum",
        "ed": 12,
        // "eth": 0.25,
        "eth": 0,
        "coin": "ETH",
        "eur": 330,
        "screen": "D1",
        "qrCodeLinkToBuyPage": "https://app.manifold.xyz/c/stateofcryptochristmas",
        "fileForDisplay": "https://drive.google.com/drive/folders/1_G5q0yGduwuaWYSa3qqvvYsxBVQmUfhR",
        "valueEth": 3,
        "artworkFileName": "The State of Crypto Christmas.png"
    },
    {
        "artiste": "Gary Cartlidge",
        "titre": "MORALITY V PRIDE",
        "twitter": "@TroyFitzpatric",
        "format": "MP4",
        "blockchain": "Ethereum",
        "ed": 25,
        // "eth": 0.1,
        "eth": 0,
        "coin": "ETH",
        "eur": 132,
        "screen": "Tr8",
        "qrCodeLinkToBuyPage": "https://app.manifold.xyz/c/morality",
        "fileForDisplay": "https://drive.google.com/drive/folders/1t9NlFIzQlkBitMmFM99pFL7hZPUqRzgX",
        "valueEth": 2.5,
        "artworkFileName": "morality v pride - gary cartlidge nft.mp4"
    },
    {
        "artiste": "Michelle Thompson",
        "titre": "DON'T LET HER STOP SMILING",
        "twitter": "@mich_tom",
        "format": "JPEG",
        "blockchain": "Ethereum",
        "ed": 12,
        // "eth": 0.125,
        "eth": 0,
        "coin": "ETH",
        "eur": 165,
        "screen": "D3",
        "qrCodeLinkToBuyPage": "https://app.manifold.xyz/c/smiling",
        "fileForDisplay": "https://drive.google.com/drive/folders/1z5pDMUrSuHnlOyKE1OgBVSGpy9DrsfPj",
        "valueEth": 1.5,
        "artworkFileName": "nft_DontLetHerStopSmiling.jpg"
    },
    {
        "artiste": "Patrick Amadon",
        "titre": "ORIGIN, SPHERE",
        "twitter": "@patrickamadon",
        "format": "GIF",
        "blockchain": "Ethereum",
        "ed": 25,
        // "eth": 0.5,
        "eth": 0,
        "coin": "ETH",
        "eur": 660,
        "screen": "D8",
        "qrCodeLinkToBuyPage": "https://gallery.manifold.xyz/0x2f68e03681ab000983f07ebe76136d64dc3081f1/1",
        "fileForDisplay": "https://drive.google.com/drive/folders/1niMNMo8hiIh2MrWuQkO_3cozUtqBMqpc",
        "valueEth": 12.5,
        "artworkFileName": "singularity, origin 2022 (social media friendly).gif"
    },
    {
        "artiste": "Stina Jones",
        "titre": "SPROUT",
        "twitter": "@stina_jones",
        "format": "PNG",
        "blockchain": "Ethereum",
        "ed": 12,
        // "eth": 0.1225,
        "eth": 0,
        "coin": "ETH",
        "eur": 161.7,
        "screen": "D6",
        "qrCodeLinkToBuyPage": "https://app.manifold.xyz/c/sprout",
        "fileForDisplay": "https://drive.google.com/drive/folders/1E9XT456--fyYhp-YkyUtCVIYRtJGT0Xp",
        "valueEth": 1.47,
        "artworkFileName": "Sprout_SJ.png"
    },
]

    for (let i = 0; i < data.length; i ++) {
        var a = document.createElement('a');
        a.classList.add("mb-10", "flex", "flex-col", "group", "bg-lime-100", "break-inside-avoid-column");
        a.ariaLabel = "buy this artwork";
        a.href = data[i].qrCodeLinkToBuyPage ? data[i].qrCodeLinkToBuyPage : "";
        a.target = "_blank";
        a.rel="noopener noreferrer";
        let media = '';
        let artworkname ='';
        let price=""


        if (data[i].eth == 0) {
          price="Soldout"
        }
        else {
          price= `${data[i].eth} ${data[i].coin}`
        }

        if (data[i].artworkFileName) {
        artworkname=data[i].artworkFileName;
        artworkname=artworkname.substr(0, artworkname.length - 4);
            
            if (data[i].artworkFileName.toLowerCase().endsWith("mp4") || 
                data[i].artworkFileName.toLowerCase().endsWith("mov") || 
                data[i].artworkFileName.toLowerCase().endsWith("m4v")
            ) {
                media = `
                <svg class="fill-current w-full"
                    xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="m497 0h-482c-8.285156 0-15 6.714844-15 15v397.445312c0 8.285157 6.714844 15 15 15h482c8.285156 0 15-6.714843 15-15v-397.445312c0-8.285156-6.714844-15-15-15zm-304.457031 264.078125v-100.710937c0-7.203126 4.109375-13.769532 10.722656-17.136719 6.71875-3.417969 14.894531-2.960938 21.113281 1.109375l85.828125 50.101562c.4375.253906.859375.53125 1.269531.828125 5.074219 3.695313 7.984376 9.328125 7.984376 15.453125s-2.910157 11.757813-7.984376 15.453125c-.410156.296875-.832031.574219-1.269531.828125l-85.828125 50.101563c-3.4375 2.246093-7.464844 3.390625-11.519531 3.390625-3.285156 0-6.585937-.753906-9.59375-2.285156-6.617187-3.363282-10.722656-9.929688-10.722656-17.132813zm159.6875-207.960937v-26.117188h50.332031v26.117188zm-30 0h-50.335938v-26.117188h50.335938zm-80.335938 0h-50.332031v-26.117188h50.332031zm-80.332031 0h-50.332031v-26.117188h50.332031zm0 315.210937v26.117187h-50.332031v-26.117187zm30 0h50.332031v26.117187h-50.332031zm80.332031 0h50.335938v26.117187h-50.335938zm80.335938 0h50.332031v26.117187h-50.332031zm129.769531-315.210937h-49.4375v-26.117188h49.4375zm-400.769531-26.117188v26.117188h-51.230469v-26.117188zm-51.230469 341.328125h51.230469v26.117187h-51.230469zm402.5625 26.117187v-26.117187h49.4375v26.117187zm0 0" class=""></path></g>
                    </svg>
                `;
                artworkvisual =`
                <video class="w-full hover:scale-105 transition duration-150 ease" muted playsinline poster="https://expo.nftfactoryparis.com/artworks/${artworkname}.png" onmouseover="this.play()" onmouseout="this.pause();this.currentTime=0;" >
                    <source src="https://expo.nftfactoryparis.com/artworks/${data[i].artworkFileName}" type="video/mp4"></source>
                </video>
                `
            } else {
                media = `
                <svg class="fill-current w-full"
                    xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g>
                        <g>
                            <g>
                                <path d="M496.327,62.694H15.673C7.018,62.694,0,69.711,0,78.367c0,5.091,0,344.759,0,355.265c0,8.656,7.018,15.673,15.673,15.673
                                    h480.653c8.656,0,15.673-7.018,15.673-15.673c0-10.506,0-350.174,0-355.265C512,69.711,504.982,62.694,496.327,62.694z
                                        M480.653,311.721L338.022,209.33c-5.463-3.922-12.818-3.922-18.281-0.001l-84.146,60.402l64.284,46.146
                                    c7.032,5.048,8.641,14.841,3.592,21.873c-5.048,7.033-14.843,8.64-21.873,3.592c-3.986-2.861-127.004-91.17-136.624-98.075
                                    c-5.463-3.922-12.818-3.92-18.281,0L31.347,311.72V94.041h449.306V311.721z"  class=""></path>
                            </g>
                        </g>
                        <g>
                            <g>
                                <path d="M208.723,134.799c-23.046,0-41.796,18.75-41.796,41.796s18.75,41.796,41.796,41.796s41.796-18.75,41.796-41.796
                                    S231.769,134.799,208.723,134.799z" class=""></path>
                            </g>
                        </g>
                    </svg>
                `;
                artworkvisual =`
                <img class="w-full hover:scale-105 transition duration-150 ease" src="https://expo.nftfactoryparis.com/artworks/${data[i].artworkFileName}" alt="">
                `
            }
        }
        
        a.innerHTML = `
            <div class="relative overflow-hidden">
                <div class=" group-hover:scale-105 transition duration-150 ease">
                    ${artworkvisual}
                </div>
                <div class="absolute bottom-4 right-4 w-5 text-NFTF-green">
                    ${media}
                </div>
            </div>
            <div id="content" class="grow flex flex-col justify-between px-4 py-4 bg-lime-100 relative">
                    <div>
                        <div class="text-lg font-bold leading-5">
                            ${data[i].titre}
                        </div>
                        <div class="leading-5 font-medium">
                            ${data[i].artiste}
                        </div>
                    </div>
                    <div class="mt-4 pt-2 flex justify-between items-center font-black text-right border-t-2 border-t-NFTF-green">
                        <div class="font-semibold">Ed: ${data[i].ed}</div>
                        <div class="font-black">${price}</div>
                    </div>
                    <div class="opacity-0 group-hover:opacity-100 transition duration-150 ease absolute inset-0 bg-NFTF-green flex items-center justify-center text-2xl font-bold">
                        BUY
                    </div>
            </div>
        `;

        document.querySelectorAll('#content')[0].append(a);
    }

</script>
</x-guest-layout>