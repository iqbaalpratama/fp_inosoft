import Instruction from './layout/pages/Instruction/Instruction'
import Layout from './layout/Layout'
import Login from './layout/pages/Auth/Login'
import TableOpenComponent from './layout/components/Content/TableOpenComponent'
import TableCompleteComponent from './layout/components/Content/TableCompleteComponent'


export const routes = [
    {
        path: '/login',
        component: Login
    },
    {
        path: '/',
        redirect: 'login',
        name: 'Layout',
        component: Layout,
        children: [
          {
            path: 'instruction',
            name: 'Instruction',
            component: Instruction,
            children: [
              {
                path: '/',
                redirect: { name: 'TableOpen' },
              }
              ,{
              path: '1',
              name: 'TableOpen',
              component: TableOpenComponent
              },
              {
                path: '2',
                name: 'TableComplete',
                component: TableCompleteComponent
              }
            ]
          }       
        ],
      },
];