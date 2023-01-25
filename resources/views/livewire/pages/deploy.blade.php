<div>
    <div class="{{ $current_step == 1 ? '' : 'hidden' }}">
        <h2>First step</h2>

        <input type="text" wire:model="collection_name">
        @error('collection_name')
            <span class="error">{{ $message }}</span>
        @enderror
    
        <input type="text" wire:model="collection_description">
        @error('collection_description')
            <span class="error">{{ $message }}</span>
        @enderror

        <button wire:click="firstStepSubmit">Next</button>
    </div>

    <div class="{{ $current_step == 2 ? '' : 'hidden' }}">
        <h2>Second step</h2>
        
        <input type="text" wire:model="max_supply">
        @error('max_supply')
            <span class="error">{{ $message }}</span>
        @enderror
    
        <input type="text" wire:model="price">
        @error('price')
            <span class="error">{{ $message }}</span>
        @enderror

        <button wire:click="back(1)">Back</button>
        <button wire:click="secondStepSubmit">Next</button>
    </div>

    <div class="{{ $current_step == 3 ? '' : 'hidden' }}">
        <h2>Third step</h2>
        
        <input type="text" wire:model="royalty_percent">
        @error('royalty_percent')
            <span class="error">{{ $message }}</span>
        @enderror

        <button wire:click="back(2)">Back</button>
        <button wire:click="thirdStepSubmit">Next</button>
    </div>

    <script>

        // async function test() {
        //     const config = await prepareSendTransaction({
        //     request: { to: 'moxey.eth', value: ethers.BigNumber.from('10000000000000000') },
        //     })
        //     const { hash } = await sendTransaction(config)
        // }

        /*
        async function deploy() {
            // prevent wallet error
            if (@this.auth_address == formatAddress(getAccount().address)) {
                const signer = await fetchSigner()
                const Factory = new ethers.ContractFactory(@this.abi, @this.byte, signer);
                // const factoryContract = await Factory.deploy("Hello, Hardhat!");
                const factoryContract = await Factory.deploy(
                    'collectionName',
                    'collectionSymbol',
                    'collectionDescription',
                    @this.ipfs_uri,
                    @this.arweave_uri,
                    @this.hash_proof,
                    'uriForFetchingOnly',
                    100,
                    ethers.utils.parseEther("1.0"),
                    @this.auth_address
                );

                await factoryContract.deployed();
                console.log("factoryContract.address", factoryContract.address);
            } else {
                console.log('error: this.auth_address differ getAccount().address')
            }
            
        }
        */

        document.addEventListener('DOMContentLoaded', function () {
            /*
            Livewire.on('readyToDeploy', event => {
                deploy()
            })
            */
            Livewire.on('urlChange', param => {
                console.log(param)
                setTimeout(()=>{ console.log(param); window.history.replaceState(null, null, param); }, 100);
            })

        })
        
    </script>
</div>