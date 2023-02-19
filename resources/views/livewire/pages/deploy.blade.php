<div>

  {{-- Logo --}}
  <a class="m-10 block mx-auto text-center" 
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

  {{-- Header --}}
  <div class="px-4 md:px-8 relative w-full lg:mx-auto lg:container xl:max-w-screen-lg">
    <div class="py-14 px-12 flex justify-between border border-black bg-black">
      <div class="text-white text-xl md:text-4xl font-black">
        @if (Auth::check())
          @if ($allowed)
            Welcome {{ Auth::user()->name ? : '' }}
          @else
            Sorry, this wallet is not allowed to mint
          @endif
        @else
          Please connect your wallet
        @endif
      </div>
      <div class="px-4 py-2 font-black text-lg bg-NFTF-green hover:bg-white text-white hover:text-black transition duration-150 ease">
        @livewire('wallet-button')
      </div>
    </div>
  </div>

  @if (Auth::check() && $allowed)
    <div class="flex justify-center">
      <div class="h-10 w-0.5 bg-black"></div>
    </div>

    <form wire:submit.prevent="submit">
      <div class="px-4 md:px-8 relative w-full lg:mx-auto lg:container xl:max-w-screen-lg">

        {{-- Blockchain --}}
        <div class="pt-8 pb-14 px-12 border border-black">
          <h1 class="text-3xl md:text-6xl lg:text-8xl font-bold  text-NFTF-green">
            BLOCKCHAIN
          </h1>
          <p class="sm:text-lg md:text-2xl font-semibold">
            Choose the blockchain for your NFTs
          </p>

          <div class="mt-10 flex flex-wrap gap-y-4 gap-x-16">

            @foreach ($networks as $network)
              <label class="flex-1 p-4 flex items-start gap-x-4 border-2 border-transparent hover:border-NFTF-green cursor-pointer">
                <input class="w-10 h-10 cursor-pointer shrink-0"
                {{ $disabled ? 'disabled' : '' }}
                type="radio"
                wire:model.lazy="network_id"
                value="{{ $network->id }}"/>
                <span class="-mt-3 fex flex-col">
                  <span class="text-xl md:text-2xl font-bold">
                    {{ $network->name }} <br>
                  </span>
                  <span class="md:text-lg">
                    {{-- Creator gas fees for the deployemnt: 0.03 ETH ($100)<br> --}}
                  </span>
                  <span class="md:text-lg">
                    {{-- First buyer gas fees for the mint: 0.003 ETH ($10) --}}
                  </span> 
                </span>
              </label>
            @endforeach
          
          </div>
          @error('network') 
            <div class="text-red-600 font-semibold">
              {{ $message }}
            </div>
          @enderror
        </div>

        <div class="flex justify-center">
          <div class="h-10 w-0.5 bg-black"></div>
        </div>

        {{-- Smart Contract --}}
        <div class="pt-8 pb-14 px-12 border border-black">
          <h1 class="text-3xl md:text-6xl lg:text-8xl font-bold  text-NFTF-green">
            SMART CONTRACT
          </h1>
          <p class="sm:text-lg md:text-2xl font-semibold">
            You will deploy your own smart contract to guarantee the sovereignty of your artwork.<br> This smart contract offer the best level of ownership for buyers.
          </p>

          <div class="mt-10">
            <div class="md:flex gap-x-10">
              <div class="flex-1 relative flex flex-col">
                <label class="text-xl md:text-2xl font-bold">
                    Contract name
                </label>
                <div class="mt-2 w-full py-2 px-3 block text-lg font-semibold border-2 border-gray-500 bg-gray-200">
                  {{ $expo->contracts_name }}
                </div>
              </div>
              <div class="hidden md:block w-1 bg-gray-200"></div>
              <ul class="flex-1 self-end list-inside list-disc">
                <li class="text-lg">
                  Lorem ipsum
                </li>
              </ul>
            </div>

            <div class="mt-10">
              <div class="md:flex gap-x-10">
                <div class="flex-1 relative flex flex-col">
                  <label class="text-xl md:text-2xl font-bold">
                    Contract symbol
                  </label>
                  <div class="mt-2 w-full py-2 px-3 block text-lg font-semibold border-2 border-gray-500 bg-gray-200">
                    {{ $expo->contracts_symbol }}
                  </div>
                </div>
                <div class="hidden md:block w-1 bg-gray-200"></div>
                <ul class="flex-1 self-end list-inside list-disc">
                  <li class="text-lg">
                    Lorem ipsum
                  </li>
                </ul>
              </div>
            </div>

            <div class="mt-10">
              <div class="md:flex gap-x-10">
                <div class="flex-1 relative flex flex-col">
                  <label class="text-xl md:text-2xl font-bold">
                    Contract description
                  </label>
                  <div class="mt-2 w-full py-2 px-3 block text-lg font-semibold border-2 border-gray-500 bg-gray-200">
                    {{ $expo->contracts_description }}
                  </div>
                </div>
                <div class="hidden md:block w-1 bg-gray-200"></div>
                <ul class="flex-1 self-end list-inside list-disc">
                  <li class="text-lg">
                    Lorem ipsum
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>

        <div class="flex justify-center">
          <div class="h-10 w-0.5 bg-black"></div>
        </div>

        {{-- Artwork --}}
        <div class="pt-8 pb-14 px-12 border border-black">
          <h1 class="text-3xl md:text-6xl lg:text-8xl font-bold  text-NFTF-green">
            ARTWORK
          </h1>
          <p class="sm:text-lg md:text-2xl font-semibold">
            NFTs will be created when buyer will mint it. <br>
            The artwork will be persistent, nothing and nobody will be able to alter it in time.
          </p>

          <div class="mt-10">
            <div class="md:flex gap-x-10">
              <div class="flex-1 relative flex flex-col">
                <label class="text-xl md:text-2xl font-bold" 
                for="artworktitle">
                  Title
                </label>
                <div>
                  <input class="mt-2 w-full py-2 px-3 block text-lg font-semibold border-2 border-black focus:outline-none focus:ring focus:ring-NFTF-green focus:border-NFTF-green 
                  {{ $errors->has('artwork_title') ? '!border-red-600' : '' }}"
                  {{ $disabled ? 'disabled' : '' }}
                  type="text" 
                  id="artworktitle" 
                  name="artworktitle" 
                  wire:model.lazy="artwork_title" 
                  placeholder="My artwork title">
                  @error('artwork_title') 
                    <div class="text-red-600 font-semibold">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
              </div>
              <div class="hidden md:block w-1 bg-gray-200"></div>
              <ul class="flex-1 self-end list-inside list-disc">
                <li class="text-lg">
                  Displayed on marketplaces for all NFTs in your collection
                </li>
                <li class="text-lg">
                  Can't be changed after the deployment
                </li>
              </ul>
            </div>
          </div>

          <div class="mt-10">
            <div class="md:flex gap-x-10">
              <div class="flex-1 relative flex flex-col">
                <label class="text-xl md:text-2xl font-bold" 
                for="artworkdescription">
                Description
                </label>
                <div>
                  <textarea class="mt-2 w-full py-2 px-3 block text-lg font-semibold border-2 border-black focus:outline-none focus:ring focus:ring-NFTF-green focus:border-NFTF-green 
                  {{ $errors->has('artwork_description') ? '!border-red-600' : '' }}"
                  type="text" 
                  id="artworkdescription" 
                  name="artworkdescription" 
                  wire:model.lazy="artwork_description" 
                  placeholder="My artwork description"></textarea>
                  @error('artwork_description') 
                    <div class="text-red-600 font-semibold">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
              </div>
              <div class="hidden md:block w-1 bg-gray-200"></div>
              <ul class="flex-1 self-end list-inside list-disc">
                <li class="text-lg">
                  Can't be changed after the deployment
                </li>
              </ul>
            </div>
          </div>

          <div class="mt-10">
            <div class="md:flex gap-x-10">
              <div class="flex-1 relative flex flex-col">
                <div class="text-xl md:text-2xl font-bold">
                Hight Definition media
                </div>

                <label class="flex relative border-2 border-dashed border-black cursor-pointer 
                {{ $errors->has('hd_media') ? '!border-red-600' : '' }}"
                for="hdMedia"
                x-data="drop_file_component()">
                  <div class="p-10 w-full rounded-xl"
                      x-bind:class="dropingFile ? 'bg-gray-300' : ''"
                      x-on:drop="dropingFile = false"
                      x-on:drop.prevent="handleFileDrop($event)"
                      x-on:dragover.prevent="dropingFile = true"
                      x-on:dragleave.prevent="dropingFile = false">
                      <div class="text-center text-xl text-gray-500 font-semibold uppercase">
                          JPEG, PNG or MP4<br>(max 500Mb)
                      </div>
                      <div class="mt-5 flex justify-center">
                          <svg class="h-16 w-16" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" x="0" y="0" viewBox="0 0 24 24" style="enable-background:new 0 0 512 512" xml:space="preserve"><g><g fill="#000" fill-rule="evenodd" clip-rule="evenodd"><path d="m20 7-4-4H5a1 1 0 0 0-1 1v16a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1zm-1 13H5V4h10.5v2.5a1 1 0 0 0 1 1H19zm-.914-13.5L16.5 4.914V6.5z" fill="#000000" data-original="#000000"></path><path d="M11.5 13.5V16h1v-2.5H15v-1h-2.5V10h-1v2.5H9v1z" fill="#000000" data-original="#000000"></path></g></g></svg>
                      </div>
                      <div class="text-center font-bold">
                        {{ is_null($this->hd_media) ? 'Upload your media here' : $this->hd_media->getClientOriginalName() }}
                      </div>
                      <div class="mt-1 flex justify-center" wire:loading.flex wire.target="hd_media">
                          <div class="flex">
                              <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-gray-700" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                  <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                  <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                              </svg>
                              <div class="font-bold">Processing Files</div>
                          </div>
                      </div>
                  </div>
                </label>
                <input {{ $disabled ? 'disabled' : '' }} id="hdMedia" class="hidden" type="file" wire:model.lazy="hd_media" />
                @error('hd_media') 
                  <div class="text-red-600 font-semibold">
                    {{ $message }}
                  </div>
                @enderror

              </div>
              <div class="hidden md:block w-1 bg-gray-200"></div>
              <ul class="flex-1 self-end list-inside list-disc">
                <li class="text-lg">
                  Can't be changed after the deployment
                </li>
              </ul>
            </div>
          </div>

          <div class="mt-10">
            <div class="md:flex gap-x-10">
              <div class="flex-1 relative flex flex-col">
                {{-- <div class="text-xl md:text-2xl font-bold">
                Low Definition media
                </div> --}}

                {{-- <label class="flex relative border-2 border-dashed border-black cursor-pointer"
                for="file-input"
                x-data="drop_file_component()">
                  <div class="p-10 w-full rounded-xl"
                      x-bind:class="dropingFile ? 'bg-gray-300' : ''"
                      x-on:drop="dropingFile = false"
                      x-on:drop.prevent="handleFileDrop($event)"
                      x-on:dragover.prevent="dropingFile = true"
                      x-on:dragleave.prevent="dropingFile = false">
                      <div class="text-center text-xl text-gray-500 font-semibold uppercase">
                          JPEG, PNG or MP4<br>(max 500Mb)
                      </div>
                      <div class="mt-5 flex justify-center">
                          <svg class="h-16 w-16" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" x="0" y="0" viewBox="0 0 24 24" style="enable-background:new 0 0 512 512" xml:space="preserve"><g><g fill="#000" fill-rule="evenodd" clip-rule="evenodd"><path d="m20 7-4-4H5a1 1 0 0 0-1 1v16a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1zm-1 13H5V4h10.5v2.5a1 1 0 0 0 1 1H19zm-.914-13.5L16.5 4.914V6.5z" fill="#000000" data-original="#000000"></path><path d="M11.5 13.5V16h1v-2.5H15v-1h-2.5V10h-1v2.5H9v1z" fill="#000000" data-original="#000000"></path></g></g></svg>
                      </div>
                      <div class="text-center font-bold {{ is_null($this->media) ? '' : 'hidden' }}" wire:loading.remove wire.target="media">Upload your media here</div>
                      <div class="text-center font-bold {{ is_null($this->media) ? 'hidden' : '' }}" wire:loading.remove wire.target="media">{{ $this->media_name }}</div>
                      <div class="mt-1 flex justify-center" wire:loading.flex wire.target="media">
                          <div class="flex">
                              <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-gray-700" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                  <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                  <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                              </svg>
                              <div class="font-bold">Processing Files</div>
                          </div>
                      </div>
                  </div>
                </label> --}}
                {{-- <input id="file-input" class="hidden" type="file" wire:model.lazy="media" /> --}}
                <div class="text-red-600 font-semibold">
                  
                </div>

              </div>
              <div class="hidden md:block w-1 bg-gray-200"></div>
              <ul class="flex-1 self-end list-inside list-disc">
                <li class="text-lg">
                  Can't be changed after the deployment
                </li>
                <li class="text-lg">
                  Onchain
                </li>
              </ul>
            </div>
          </div>

          <div class="mt-10">
            <div class="md:flex gap-x-10">
              <div class="flex-1 relative flex flex-col">
                <label class="text-xl md:text-2xl font-bold" 
                for="price">
                  Price
                </label>
                <div>
                  <div class="flex gap-x-5 items-center text-xl md:text-2xl font-bold">
                    <input class="flex-1 mt-2 py-2 px-3 block text-lg font-semibold border-2 border-black focus:outline-none focus:ring focus:ring-NFTF-green focus:border-NFTF-green 
                    {{ $errors->has('artwork_price') ? '!border-red-600' : '' }}"
                    {{ $disabled ? 'disabled' : '' }}
                    type="number" 
                    min="0"
                    placeholder="10"
                    name="price"
                    wire:model.lazy="artwork_price">
                    ETH
                  </div>
                  @error('artwork_price') 
                    <div class="text-red-600 font-semibold">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
              </div>
              <div class="hidden md:block w-1 bg-gray-200"></div>
              <ul class="flex-1 self-end list-inside list-disc">
                <li class="text-lg">
                  First market price
                </li>
                <li class="text-lg">
                  70% of the price in the wallet used for the deployment (the wallet connected right now)
                </li>
                <li class="text-lg">
                  30% fees token on the price for the NFT Factory
                </li>
                <li class="text-lg">
                  Approximatively 0.01 ETH transaction fees more for the buyer 
                </li>
              </ul>
            </div>
          </div>

          <div class="mt-10">
            <div class="md:flex gap-x-10">
              <div class="flex-1 relative flex flex-col">
                <label class="text-xl md:text-2xl font-bold" 
                for="maxsupply">
                  Max supply
                </label>
                <div>
                  <input class="mt-2 w-full py-2 px-3 block text-lg font-semibold border-2 border-black focus:outline-none focus:ring focus:ring-NFTF-green focus:border-NFTF-green 
                  {{ $errors->has('artwork_max_supply') ? '!border-red-600' : '' }}"
                  {{ $disabled ? 'disabled' : '' }}
                  type="number" 
                  min="0" 
                  step="1"
                  placeholder="10"
                  name="maxsupply"
                  wire:model.lazy="artwork_max_supply">
                  @error('artwork_max_supply') 
                    <div class="text-red-600 font-semibold">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
              </div>
              <div class="hidden md:block w-1 bg-gray-200"></div>
              <ul class="flex-1 self-end list-inside list-disc">
                <li class="text-lg">
                  The max supply is the number max of mintable NFT
                </li>
                <li class="text-lg">
                  Number of edition is the total of minted NFTs
                </li>
                <li class="text-lg">
                  Be careful for max supply 1 no free drop possible
                </li>
              </ul>
            </div>
          </div>

          <div class="mt-10">
            <div class="md:flex gap-x-10">
              <div class="flex-1 relative flex flex-col">
                <label class="text-xl md:text-2xl font-bold" 
                for="contractname">
                  Send 1 NFT for free in your wallet
                </label>
                <div>
                  <div class="flex gap-x-10">
                    <label class="mt-6 flex items-start gap-x-4 cursor-pointer">
                      <input
                        {{ $disabled ? 'disabled' : '' }}
                        class="w-10 h-10 cursor-pointer shrink-0"
                        type="radio"
                        wire:model.lazy="free_nft"
                        value="1">
                      <span class="-mt-3 fex flex-col ">
                        <span class="text-xl md:text-2xl font-bold">
                          Yes
                        </span>
                      </span>
                    </label>
                    <label class="mt-6 flex items-start gap-x-4 cursor-pointer">
                      <input class="w-10 h-10 cursor-pointer shrink-0"
                        {{ $disabled ? 'disabled' : '' }}
                        type="radio"
                        wire:model.lazy="free_nft"
                        value="0">
                      <span class="-mt-3 fex flex-col">
                        <span class="text-xl md:text-2xl font-bold">
                          No
                        </span>
                      </span>
                    </label>
                  </div>
                  <div class="text-red-600 font-semibold">
                    {{-- error here --}}
                  </div>
                </div>
              </div>
              <div class="hidden md:block w-1 bg-gray-200"></div>
              <ul class="flex-1 self-end list-inside list-disc">
                <li class="text-lg">
                  Option available if your max supply is greater than one
                </li>
                <li class="text-lg">
                  Free mint and negligible fee gas
                </li>
              </ul>
            </div>
          </div>
        </div>

        <div class="flex justify-center">
          <div class="h-10 w-0.5 bg-black"></div>
        </div>

        {{-- Mint Page --}}
        <div class="pt-8 pb-14 px-12 border border-black">
          <h1 class="text-3xl md:text-6xl lg:text-8xl font-bold  text-NFTF-green">
            MINT PAGE
          </h1>
          <p class="sm:text-lg md:text-2xl font-semibold">
            Web2 info to added on the mint page.
          </p>

          <div class="mt-10">
            <div class="md:flex gap-x-10">
              <div class="flex-1 relative flex flex-col">
                <label class="text-xl md:text-2xl font-bold" 
                for="portfoliolink">
                  Portfolio link
                </label>
                <div>
                  <input class="mt-2 w-full py-2 px-3 block text-lg font-semibold border-2 border-black focus:outline-none focus:ring focus:ring-NFTF-green focus:border-NFTF-green 
                  {{ $errors->has('artist_portfolio_link') ? '!border-red-600' : '' }}"
                  {{ $disabled ? 'disabled' : '' }}
                  type="text" 
                  id="portfoliolink" 
                  name="portfoliolink"
                  wire:model.lazy="artist_portfolio_link"
                  placeholder="https://mypportfolio.com">
                  @error('artist_portfolio_link') 
                    <div class="text-red-600 font-semibold">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
              </div>
              <div class="hidden md:block w-1 bg-white"></div>
              <ul class="flex-1 self-end list-inside list-disc">

              </ul>
            </div>

            <div class="mt-10">
              <div class="md:flex gap-x-10">
                <div class="flex-1 relative flex flex-col">
                  <label class="text-xl md:text-2xl font-bold" 
                  for="twitterlink">
                    Twitter link
                  </label>
                  <div>
                    <input class="mt-2 w-full py-2 px-3 block text-lg font-semibold border-2 border-black focus:outline-none focus:ring focus:ring-NFTF-green focus:border-NFTF-green 
                    {{ $errors->has('artist_twitter_link') ? '!border-red-600' : '' }}"
                    {{ $disabled ? 'disabled' : '' }}
                    type="text" 
                    id="twitterlink" 
                    name="twitterlink"
                    wire:model.lazy="artist_twitter_link"
                    placeholder="https://twitter.com/mypseudo">
                    @error('artist_twitter_link') 
                      <div class="text-red-600 font-semibold">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                </div>
                <div class="hidden md:block w-1 bg-white"></div>
                <ul class="flex-1 self-end list-inside list-disc">

                </ul>
              </div>
            </div>

            <div class="mt-10">
              <div class="md:flex gap-x-10">
                <div class="flex-1 relative flex flex-col">
                  <label class="text-xl md:text-2xl font-bold" 
                  for="mail">
                    Contact mail
                  </label>
                  <div>
                    <input class="mt-2 w-full py-2 px-3 block text-lg font-semibold border-2 border-black focus:outline-none focus:ring focus:ring-NFTF-green focus:border-NFTF-green 
                    {{ $errors->has('artist_contact_mail') ? '!border-red-600' : '' }}"
                    {{ $disabled ? 'disabled' : '' }}
                    type="text" 
                    id="mail" 
                    name="mail" 
                    wire:model.lazy="artist_contact_mail"
                    placeholder="your@mail.com">
                    @error('artist_contact_mail') 
                      <div class="text-red-600 font-semibold">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                </div>
                <div class="hidden md:block w-1 bg-white"></div>
                <ul class="flex-1 self-end list-inside list-disc">

                </ul>
              </div>
            </div>

          </div>
        </div>
      </div>

      @if (!is_null($public_id))
          @if ($this->smart_contract->status == 'editing')
            <button type="submit" class="block mx-auto mt-10 mb-14  px-16 py-9 font-bold text-5xl bg-NFTF-green hover:bg-black text-white transition duration-150 ease">
              Submit for approval
            </button>
          @elseif ($this->smart_contract->status == 'waiting_for_validation')
            <button disabled class="block mx-auto mt-10 mb-14  px-16 py-9 font-bold text-5xl bg-NFTF-green hover:bg-black text-white transition duration-150 ease">
              Contract in review
            </button>
          @elseif ($this->smart_contract->status == 'ready_to_deploy')
            <button type="submit" class="block mx-auto mt-10 mb-14  px-16 py-9 font-bold text-5xl bg-NFTF-green hover:bg-black text-white transition duration-150 ease">
              {{ $state ? : 'Deploy' }}
            </button>
          @endif
      @endif
      @if (count($errors->all()) > 0)
        <p>There is some errors above</p>
      @endif
    </form>
  @endif

  <script>

    const tx = document.getElementsByTagName("textarea");
    for (let i = 0; i < tx.length; i++) {
      tx[i].setAttribute("style", "height:" + (tx[i].scrollHeight) + "px;overflow-y:hidden;");
      tx[i].addEventListener("input", OnInput, false);
    }


    function OnInput() {
      this.style.minHeight = "0";
      this.style.minHeight = (this.scrollHeight) + "px";
    }

    async function arweaveUpload(type, file) {
      let reader  = new FileReader();

      reader.addEventListener("load", function () {
          let key = @this.get('arweave_key');
          arweave.createTransaction({ data: buffer.from(reader.result.split(',')[1], 'base64') }, JSON.parse(key))
          .then((transaction) => {
              transaction.addTag('Content-Type', type);
              arweave.transactions.sign(transaction, JSON.parse(key))
              .then(() => {
                  arweave.transactions.getUploader(transaction)
                  .then((uploader) => {
                      function loop() {
                          uploader.uploadChunk()
                          .then(() => {
                              if (!uploader.isComplete) {
                                  console.log('need to loop')
                                  loop()
                              } else {
                                  console.log('done')
                                  @this.set('arweave_hash', transaction.id)
                                  Livewire.emit('arweaveUploaded')
                              }
                          })
                      }
                      loop();
                  })
              });
          });
      }, false);

      reader.readAsDataURL(file);
    }

    function drop_file_component() {
        return {
            dropingFile: false,
            handleFileDrop(e) {
                if (event.dataTransfer.files.length > 0) {
                    const files = e.dataTransfer.files;
                    console.log(files[0].name);
                    @this.upload('hd_media', files[0],
                        (uploadedFilename) => {
                        }, () => {}, (event) => {}
                    )
                }
            }
        };
    }

      // async function test() {
      //     const config = await prepareSendTransaction({
      //     request: { to: 'moxey.eth', value: ethers.BigNumber.from('10000000000000000') },
      //     })
      //     const { hash } = await sendTransaction(config)
      // }

      
      async function deploy() {
          // prevent wallet error
          if (@this.auth_address == formatAddress(getAccount().address)) {
              const signer = await fetchSigner()
              const Factory = new ethers.ContractFactory(@this.abi, @this.byte, signer);
              // const factoryContract = await Factory.deploy("Hello, Hardhat!");
              const factoryContract = await Factory.deploy(
                  @this.name,
                  @this.symbol,
                  @this.description,
                  @this.ipfs_hash,
                  @this.arweave_hash,
                  @this.sha_hash,
                  @this.ipfs_json_hash,
                  @this.artwork_royalty,
                  ethers.utils.parseEther(@this.artwork_price),
                  @this.auth_address
              );

              await factoryContract.deployed();
              
              Livewire.emit('smartContractDeployed', factoryContract.address)
              console.log(" address", factoryContract.address);
          } else {
              console.log('error: this.auth_address differ getAccount().address')
          }
          
      }
      

      document.addEventListener('DOMContentLoaded', function () {
        
        Livewire.on('uploadArweaveOnJs', function (type) {
          file = document.querySelector('input[type=file]').files[0]
          arweaveUpload(type, file)
        });

        Livewire.on('deploySmartContractOnJs', function (type) {
          //deploy()
        });

      })
      
  </script>
</div>