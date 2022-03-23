import ListStock from "./components/stock/ListStock";
import CreateStock from "./components/stock/CreateStock";
import EditStock from "./components/stock/EditStock";
import ListClient from "./components/client/ListClient";
import CreateClient from "./components/client/CreateClient";
import ListClientStock from "./components/client/ListClientStock";
import CreateClientStock from "./components/client/CreateClientStock";
import ShowClientStock from "./components/client/ShowClientStock";

export const routes = [
    {
        path: '/',
        name: 'ListStock',
        component: ListStock
    },
    {
        path: '/create/stock',
        name: 'CreateStock',
        component: CreateStock
    },
    {
        path: '/edit/stock/:id',
        name: 'EditStock',
        component: EditStock,
    },
    {
        path: '/clients',
        name: 'ListClient',
        component: ListClient,
    },
    {
        path: '/client/create',
        name: 'CreateClient',
        component: CreateClient,
    },
    {
        path: '/client-stocks',
        name: 'ListClientStock',
        component: ListClientStock,
    },
    {
        path: '/create/client-stock',
        name: 'CreateClientStock',
        component: CreateClientStock,
    },
    {
        path: '/show/client-stock/:id',
        name: 'ShowClientStock',
        component: ShowClientStock,
    }

];
