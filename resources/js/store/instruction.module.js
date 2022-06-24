import  InstructionService  from '../services/instruction.service';

const state = {
    dataInstruction: []
};


const mutations = {
    AllInstruction(state, payload){
        state.dataInstruction = payload.data;
    }
};

const actions = {
    getAllInstruction({commit}){
        InstructionService.getAll().then(
            response => {
                commit('AllInstruction', response.data);
            },
            error => {
                console.log(error);
            }
        );
    },

    AddDataInstruction({dispatch},data){
        return new Promise((resolve, reject) => {
            InstructionService.Store(data).then(
                response => {
                    resolve(response);
                    dispatch('getAllInstruction')
                },
                error => {
                    reject(error);
                }
            );
        })
    },
    ReceiveInvoice({dispatch},data){
        InstructionService.receiveInvoice(data).then(
            response => {
                console.log(response);
            },
            error => {
                console.log(error);
            }
        );
    },
    EditDataInstruction({dispatch},{id,data}){
        InstructionService.UpdateInvoice(id,data).then(
            response => {
                console.log(response);
                console.log('Update Berhasil')
                dispatch('getAllInstruction')
            },
            error => {
                console.log(error);
            }
        );
    }
};
const getters = {
    FilteredDataInstruction: (state) => (status,status2=null) => {
        return state.dataInstruction.filter(data => {
            return data.status == status || data.status == status2 
        })
    }
}

export const instruction = {
    namespaced: true,
    getters,
    state,
    actions,
    mutations
};
