<div>
    <button x-data @click="openModal()">{{ $auth_user ? $auth_user->eth_address : 'Connect wallet' }}</button>
    <!-- <w3m-core-button></w3m-core-button> -->
    <!-- <w3m-network-switch></w3m-network-switch> -->
    <script>

        async function openModal() {
            try {
                provider = await Web3modal.openModal();
            } catch(e) {
                console.log("Could not get a wallet connection", e);
                return;
            }
        }

        document.addEventListener('DOMContentLoaded', function () {
            
            
        })
    </script>
</div>