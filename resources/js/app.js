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

import {
  configureChains,
  createClient,
  
  connect,
  fetchSigner,
  getAccount,
  getNetwork,
  watchAccount,
  watchNetwork,
  waitForTransaction,
  writeContract,
  signMessage,
  switchNetwork,
} from '@wagmi/core'
window.connect = connect;
window.fetchSigner = fetchSigner;
window.getAccount = getAccount;
window.getNetwork = getNetwork;
window.watchAccount = watchAccount;
window.watchNetwork = watchNetwork;
window.waitForTransaction = waitForTransaction;
window.writeContract = writeContract;
window.signMessage = signMessage;
window.switchNetwork = switchNetwork;

import { InjectedConnector } from '@wagmi/core/connectors/injected'
window.InjectedConnector = InjectedConnector;

import { mainnet, polygon, goerli } from "@wagmi/core/chains";
import { alchemyProvider } from '@wagmi/core/providers/alchemy'
import { publicProvider } from '@wagmi/core/providers/public'
import { Web3Modal } from "@web3modal/html";
import { EthereumClient, modalConnectors } from "@web3modal/ethereum";

// **** Setting Wagmi Client & Web3modal
  const chains = [mainnet, polygon, goerli];
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

import { Buffer } from 'buffer';
window.buffer = Buffer;

import Arweave from 'arweave';
window.arweave = Arweave.init({
  host: 'arweave.net',
  port: 443,
  protocol: 'https',
  timeout: 300000,
  logging: false,
});


// import Turbolinks from 'turbolinks';
// Turbolinks.start();