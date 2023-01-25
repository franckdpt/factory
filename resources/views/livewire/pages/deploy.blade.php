<div>
    <form wire:submit.prevent="submit">
        <h2>Form</h2>

        <input type="text" wire:model="collection_name">
        @error('collection_name')
            <span class="error">{{ $message }}</span>
        @enderror
    
        <input type="text" wire:model="collection_description">
        @error('collection_description')
            <span class="error">{{ $message }}</span>
        @enderror

        <button type="submit">Submit</button>
    </form>

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

        })
        
    </script>
</div>