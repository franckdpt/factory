<div class="{{ $classAdded ?? '' }}">
    <button x-data @click="openWalletModal()">{{ Auth::check() ? Auth::user()->reduced_wallet_address : 'Connect wallet' }}</button>
    <!-- <w3m-core-button></w3m-core-button> -->
    <!-- <w3m-network-switch></w3m-network-switch> -->
    <script>

        async function openWalletModal() {
            try {
                provider = await Web3modal.openWalletModal();
            } catch(e) {
                console.log("Could not get a wallet connection", e);
                return;
            }
        }

        document.addEventListener('DOMContentLoaded', function () {
            
            
        })
    </script>
</div>