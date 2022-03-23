import ListStock from "./components/stock/ListStock";
import CreateStock from "./components/stock/CreateStock";
import EditStock from "./components/stock/EditStock";
import ListClient from "./components/client/ListClient";
import CreateClient from "./components/client/CreateClient";

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
    }
];
