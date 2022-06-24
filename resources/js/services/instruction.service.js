import axios from 'axios';
const API_URL = 'http://localhost:8000/api/';

class InstructionService{
    getAll(){
        return axios.get(API_URL + 'getall_instruction');
    }
    Store(data){
        return axios.post(API_URL + 'create_instruction', data);
    }
    UpdateInvoice(id,data){
        return axios.post(API_URL + 'update_instruction/' + id, data);
    }
    getDetail(id){
        return axios.get(API_URL + 'getdetail_instruction/' + id);
    }
}
export default new InstructionService();
