import ListStock from "./components/stock/ListStock";
import CreateStock from "./components/stock/CreateStock";
import EditStock from "./components/stock/EditStock";

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
    }
];
