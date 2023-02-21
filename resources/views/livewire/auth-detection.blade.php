<div>
    <script>
        // async function signMessageToRegister(signature) {
        //     try {
        //         const sign = await signMessage({ message: signature })
        //         Livewire.emit('onRegisterMessageSigned', sign, ethers.utils.getAddress(getAccount().address))
        //     } catch {
        //         console.log('user denied message signature');
        //     }
        // }
        
        // window.addEventListener('register-message-generated', event => {
        //     signMessageToRegister(@this.message)
        // })
        
        function formatAddress(address) {
            return typeof address == 'string' ? address : ''
        }

        document.addEventListener('DOMContentLoaded', function () {

            const unwatchAccount = watchAccount((account) => {
                if (account.isConnected) {
                    Livewire.emit('onWalletConnected', formatAddress(account.address))
                } else if (account.isConnecting) {
                    Livewire.emit('onWalletConnecting')
                } else if (account.isDisconnected) {
                    Livewire.emit('onWalletDisconnected')
                }
            })

            const unwatchNetwork = watchNetwork((network) => {
                Livewire.emit('onNetworkChanged', network.chain.id)
            })

        })
    </script>
</div>