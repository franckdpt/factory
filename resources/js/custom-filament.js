import { 
  watchAccount,
  watchNetwork,
  configureChains,
  createClient,
} from '@wagmi/core'
window.watchAccount = watchAccount;
window.watchNetwork = watchNetwork;

import { arbitrum, mainnet, polygon } from "@wagmi/core/chains";
import { alchemyProvider } from '@wagmi/core/providers/alchemy'
import { publicProvider } from '@wagmi/core/providers/public'
import { Web3Modal } from "@web3modal/html";
import { EthereumClient, modalConnectors } from "@web3modal/ethereum";

// **** Setting Wagmi Client & Web3modal
  const chains = [arbitrum, mainnet, polygon];
  const { provider } = configureChains(chains, 
    [alchemyProvider({ apiKey: 'V75jiJtBsKTCcAfCeuWkZkc8xLR76gWb' }), publicProvider()],
  );
  const wagmiClient = createClient({
    autoConnect: true,
    connectors: modalConnectors({ appName: "web3Modal", chains }),
    provider,
  });
  const web3modal = new Web3Modal(
    { projectId: "9085b23bd6b98001f500bc35e59e53eb" },
    new EthereumClient(wagmiClient, chains)
  );
  window.Web3modal = web3modal;
// ****