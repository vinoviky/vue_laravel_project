import EmployeesIndex from "./components/employees/Index";
import EmployeesCreate from "./components/employees/Create";
import EmployeesEdit from "./components/employees/Edit";
import CountriesIndex from "./components/countries/index";
import CountriesCreate from "./components/countries/create";
import CountriesEdit from "./components/countries/edit";
import CitiesIndex from "./components/cities/index";
import CitiesCreate from "./components/cities/create";
import CitiesEdit from "./components/cities/edit";
import StatesIndex from "./components/states/index";
import StatesCreate from "./components/states/create";
import StatesEdit from "./components/states/edit";


export const routes = [
    {
        path: "/employees",
        name: "EmployeesIndex",
        component: EmployeesIndex
    },
    {
        path: "/employees/create",
        name: "EmployeesCreate",
        component: EmployeesCreate
    },
    {
        path: "/employees/:id",
        name: "EmployeesEdit",
        component: EmployeesEdit
    },
    {
        path: "/countries",
        name: "CountriesIndex",
        component: CountriesIndex
    },
    {
        path: "/countries/create",
        name: "CountriesCreate",
        component: CountriesCreate
    },
    {
        path: "/countries/edit",
        name: "CountriesEdit",
        component: CountriesEdit
    },
    {
        path: "/cities",
        name: "CitiesIndex",
        component: CitiesIndex
    },
    {
        path: "/cities",
        name: "CitiesCreate",
        component: CitiesCreate
    },
    {
        path: "/cities/:id",
        name: "CitiesEdit",
        component: CitiesEdit
    },
    {
        path: "/states",
        name: "StatesIndex",
        component: StatesIndex
    },
    {
        path: "/states",
        name: "StatesCreate",
        component: StatesCreate
    },
    {
        path: "/states/:id",
        name: "StatesEdit",
        component: StatesEdit
    },
];
