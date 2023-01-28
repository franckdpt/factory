import './bootstrap';

// Alpine JS
import Alpine from 'alpinejs';
import FormsAlpinePlugin from '../../vendor/filament/forms/dist/module.esm'
import NotificationsAlpinePlugin from '../../vendor/filament/notifications/dist/module.esm'
import focus from '@alpinejs/focus';
Alpine.plugin(FormsAlpinePlugin)
Alpine.plugin(NotificationsAlpinePlugin)
Alpine.plugin(focus);

window.Alpine = Alpine;
Alpine.start();

// Ethers JS
import { ethers } from "ethers";
window.ethers = ethers;

// Wagmi & Web3modal
import { 
    configureChains,
    createClient,
    sendTransaction,
    prepareSendTransaction
  } from "@wagmi/core";
window.prepareSendTransaction = prepareSendTransaction;
window.sendTransaction = sendTransaction;

import { 
  fetchSigner,
  getAccount,
  watchAccount,
  watchNetwork,
  waitForTransaction,
  signMessage
} from '@wagmi/core'
window.fetchSigner = fetchSigner;
window.getAccount = getAccount;
window.watchAccount = watchAccount;
window.watchNetwork = watchNetwork;
window.waitForTransaction = waitForTransaction;
window.signMessage = signMessage;

import { connect } from '@wagmi/core'
import { InjectedConnector } from '@wagmi/core/connectors/injected'
window.connect = connect;
window.InjectedConnector = InjectedConnector;

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

// import Turbolinks from 'turbolinks';
// Turbolinks.start();