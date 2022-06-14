import axios from 'axios';
const API_URL = 'http://localhost:8000/api/';

class InstructionService{
    getAll(){
        return axios.get(API_URL + 'instruction');
    }
    Store(data){
        return axios.post(API_URL + 'instruction', data);
    }
    getDetail(id){
        return axios.get(API_URL + 'instruction/' + id);
    }
}
export default new InstructionService();
