<div>
  <div class="py-4 d:py-7 px-4 md:px-8 relative w-full lg:mx-auto lg:container xl:max-w-screen-lg">
    <div class="md:flex justify-between items-center">
      <a href="https://nftfactoryparis.com/">
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
      <div class="mt-4 md:mt-0 flex justify-between md:justify-start gap-4 items-center text-2xl font-semibold">
        <a href="{{ route('expo', $expo) }}">
          {{ $expo->name }}
        </a>
      </div>
    </div>

    <div class="mt-16 md:flex items-start">
      <div class="md:w-1/2 pr-5 md:sticky top-10">
        <video class="w-full" controls loop playsinline poster="{{ config('app.url').'/storage/custom/yura_cover.png'}}" onmouseover="this.play()" onmouseout="this.pause();this.currentTime=0;">
            <source src="{{ config('app.url').'/storage/custom/yura.mp4'}}" type="video/mp4">
        </video>
      </div>

      <div class="md:w-1/2 pt-10 md:pt-0 md:pl-5">
        <div>
          <h1 class="-mt-5 text-6xl md:text-5xl lg:text-7xl font-bold">
            Vincent & Frida
          </h1>
          <p class="mt-3 text-lg">
            In this work I imagine an alternative reality story, where Vincent Van Gogh and Frida Khalo are living in the same time and place. We all know that both of their lives were full of pain and suffering. Out of compassion I've imagined their love story, where they live happily together. We are going inside of Vincent’s dream and see it unfolding in a combination of their iconic styles. No pain or suffering included, only joy of being with a loved One.<br/><br/>
            The process of creating was very similar to my ‘Basquait + Klimt’ and ‘Dali + Grey’ works for these series.<br/>
            Music was also written by me specifically for this artwork.<br/>
            Created during May-July of 2022 by yours truly, Yura Miron.<br/>
            First minted NFT of this artwork was sent to burn address and reminted exclusively on this '100 percent AI X Yura Miron' smart contract on KnownOrigin in March of 2023
          </p>
          <div class="mt-6 flex justify-between items-center text-xl">
            <div class="font-bold">
              by Yura Miron</a>
            </div>
            <div class="flex gap-4">
              <a class="hover:text-NFTF-green NFTF-transition" 
              href="https://linktr.ee/yuramironart"
              target="_blank" 
              rel="noopener noreferrer">
                <svg class="w-8 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 19 19">
                  <path id="Tracé_152" data-name="Tracé 152" d="M9.5,19A9.5,9.5,0,1,1,19,9.5,9.511,9.511,0,0,1,9.5,19Zm1.746-4.45a5.373,5.373,0,0,0,3.071-2.738H12.141a9.705,9.705,0,0,1-.536,1.993A5.68,5.68,0,0,1,11.246,14.55ZM4.683,11.812A5.373,5.373,0,0,0,7.754,14.55a5.689,5.689,0,0,1-.359-.745,9.7,9.7,0,0,1-.536-1.993ZM7.754,4.45A5.373,5.373,0,0,0,4.683,7.188H6.859a9.7,9.7,0,0,1,.536-1.993,5.68,5.68,0,0,1,.359-.745ZM9.5,4.156c-.39,0-.847.538-1.193,1.4a8.517,8.517,0,0,0-.451,1.628h3.289a8.515,8.515,0,0,0-.451-1.628C10.347,4.694,9.89,4.156,9.5,4.156ZM4.156,9.5a5.336,5.336,0,0,0,.167,1.329H6.734c-.039-.432-.06-.877-.06-1.329s.021-.9.06-1.329H4.324A5.336,5.336,0,0,0,4.156,9.5ZM7.72,10.829H11.28c.041-.43.063-.875.063-1.329s-.022-.9-.063-1.329H7.72c-.041.43-.063.875-.063,1.329S7.679,10.4,7.72,10.829ZM9.5,14.844c.39,0,.847-.538,1.193-1.4a8.514,8.514,0,0,0,.451-1.628H7.856a8.518,8.518,0,0,0,.451,1.628C8.653,14.306,9.11,14.844,9.5,14.844ZM14.844,9.5a5.336,5.336,0,0,0-.167-1.329H12.266c.039.432.06.877.06,1.329s-.021.9-.06,1.329h2.411A5.336,5.336,0,0,0,14.844,9.5Zm-.526-2.312A5.373,5.373,0,0,0,11.246,4.45a5.687,5.687,0,0,1,.359.745,9.7,9.7,0,0,1,.536,1.993h2.176ZM15.827,9.5A6.327,6.327,0,1,1,9.5,3.173,6.334,6.334,0,0,1,15.827,9.5Z" fill-rule="evenodd"/>
                </svg>              
              </a>
              <a class="hover:text-NFTF-green NFTF-transition" 
              href="https://twitter.com/YuraMironArt" 
              target="_blank" 
              rel="noopener noreferrer">
                <svg class="w-8 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 19 19">
                  <path id="Tracé_151" data-name="Tracé 151" d="M9.5,0A9.5,9.5,0,1,0,19,9.5,9.5,9.5,0,0,0,9.5,0Zm4.338,7.407q.006.14.006.282a6.162,6.162,0,0,1-6.2,6.2h0a6.172,6.172,0,0,1-3.342-.98,4.434,4.434,0,0,0,.52.03,4.375,4.375,0,0,0,2.708-.933A2.183,2.183,0,0,1,5.489,10.5a2.173,2.173,0,0,0,.985-.037A2.181,2.181,0,0,1,4.724,8.321c0-.01,0-.019,0-.028a2.165,2.165,0,0,0,.988.273,2.182,2.182,0,0,1-.675-2.911A6.191,6.191,0,0,0,9.532,7.933a2.182,2.182,0,0,1,3.716-1.989,4.374,4.374,0,0,0,1.385-.529,2.189,2.189,0,0,1-.959,1.206,4.348,4.348,0,0,0,1.252-.343,4.431,4.431,0,0,1-1.088,1.129Zm0,0"/>
                </svg>
              </a>
            </div>
          </div>
        </div>

        <hr class="my-16 border-gray-400">

        <div>
          <h2 class="text-4xl font-bold">
            Price
          </h2>

          <div class="mt-2 text-6xl md:text-5xl lg:text-7xl font-black">
            1.5 ETH
          </div>

          <div class="flex gap-10 text-center">
            <a href="https://knownorigin.io/contract/0x33b775662c2541b4f1146f3555475bce49075763/100000" target="_blank" class="flex-1 mt-10 px-5 pt-5 pb-7 bg-NFTF-green hover:bg-black text-white text-4xl md:text-6xl font-black NFTF-transition">
                BUY
            </a>
          </div>

        </div>

        <hr class="my-16 border-gray-400">

        <div>
          <h2 class="text-4xl font-bold">
            Artwork Properties
          </h2>
          <ul class="mt-6 text-lg">
            <li>
              <span class="font-bold">Published:</span> March 13rd, 2023
            </li>
            <li>
              <span class="font-bold">File format:</span> mp4
            </li>
            {{-- <li>
              <span class="font-bold">HD file size:</span> {{ $smart_contract->artwork_size }}
            </li> --}}
          </ul>
        </div>

        <hr class="my-16 border-gray-400">

        <div>
          <h2 class="text-4xl font-bold">
            NFT Details
          </h2>
          <ul class="mt-6 text-lg">
            <li>
              <span class="font-bold">Contract address:</span> 0x33b775662c2541b4f1146f3555475bce49075763
            </li>
            <li>
              <span class="font-bold">Type:</span> ERC-721
            </li>
            <li>
              <span class="font-bold">Blockchain:</span> Ethereum
            </li>
          </ul>
        </div>

        <hr class="my-16 border-gray-400">

        <div>
          <h2 class="text-4xl font-bold">
            Useful links
          </h2>
          <ul class="mt-6 flex gap-4 flex-wrap text-lg">
            <li>
              <a class="px-6 py-2 flex items-center gap-x-3 bg-black hover:bg-NFTF-green text-white hover:bg NFTF-transition"
              href="https://knownorigin.io/contract/0x33b775662c2541b4f1146f3555475bce49075763/100000"
              target="_blank"
              rel="noopener noreferrer">
              <svg class="w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 13.865 13.865">
                <g id="Groupe_93" data-name="Groupe 93" transform="translate(-4 -4)">
                  <path id="Tracé_147" data-name="Tracé 147" d="M17.865,4.462V8.622a.462.462,0,0,1-.924,0V5.578l-6.606,6.606a.462.462,0,1,1-.653-.653l6.606-6.606H13.243a.462.462,0,0,1,0-.924H17.4A.462.462,0,0,1,17.865,4.462ZM16.016,16.478V10.932a.462.462,0,1,0-.924,0v5.546a.462.462,0,0,1-.462.462H5.386a.462.462,0,0,1-.462-.462V7.235a.462.462,0,0,1,.462-.462h5.546a.462.462,0,0,0,0-.924H5.386A1.388,1.388,0,0,0,4,7.235v9.243a1.388,1.388,0,0,0,1.386,1.386H14.63A1.388,1.388,0,0,0,16.016,16.478Z" fill="#fff"/>
                </g>
              </svg>
                KnownOrigin
              </a>
            </li>
          </ul>
        </div>

      </div>

    </div>

    <div>
      <hr class="my-16 border-gray-400">

      <h1 class="-mt-5 text-6xl md:text-5xl lg:text-7xl font-bold">
        {{ $expo->name }}
      </h1>
      <div class="mt-3 text-lg">
        {!! \Illuminate\Support\Str::markdown($expo->description) !!}
      </div>
    </div>
  <div>

</div>