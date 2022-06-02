import Instruction from './layout/pages/Instruction/Instruction'
import Layout from './layout/Layout'
import Login from './layout/pages/Auth/Login'

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
            component: Instruction
          }       
        ],
      },
];