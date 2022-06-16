import Instruction from './layout/pages/Instruction/Instruction'
import Layout from './layout/Layout'
import Login from './layout/pages/Auth/Login'
import TableOpenComponent from './layout/components/Content/TableOpenComponent'
import TableCompleteComponent from './layout/components/Content/TableCompleteComponent'
import CreateInstruction from './layout/pages/CreateInstruction/CreateInstruction'
import DetailInstruction from './layout/pages/DetailsInstruction/DetailInstruction'
import ModifyInstruction from './layout/pages/ModifyInstruction/ModifyInstruction'



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
              },
              {
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
          },
          {
            path: 'instruction/new',
            name: 'NewInstruction',
            component: CreateInstruction
          },
          {
            path: 'instruction/detail/:id',
            name: 'DetailInstruction',
            component: DetailInstruction
          },
          {
            path: 'instruction/edit/:id',
            name: 'ModifyInstruction',
            component: ModifyInstruction
          }      
        ],
      },
];