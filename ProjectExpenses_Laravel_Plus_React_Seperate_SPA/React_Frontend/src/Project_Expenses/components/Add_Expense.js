import axios from 'axios';
import React, {useState} from 'react';
import {useHistory} from 'react-router-dom';
import { Button } from 'reactstrap';




export default function Add_Expense() {
  
    const history = useHistory();

    const [name, setName] = useState('');
    const [amount, setAmount] = useState('');
    const [category_id, setCategory_id] = useState('');
    const [date, setDate] = useState('');

    var isloggedin=localStorage.getItem('isloggedin');
    if(isloggedin!="true"){
        history.push('/login');
        
       
      }
    async function makePostRequest() {

        const datato_send = {
            user_id: localStorage.getItem('user_id'),
            name: name,
            category_id: category_id,
            date: date,
            amount:amount
          }
    
        let res = await axios.post('http://localhost:8000/api/addExpense', datato_send);
    
        console.log(res.data);
        if(res.data.data=='Post created!'){
        alert('expense added');
        history.push('/home');
        }
        else{
            alert('erj3 jarreb hbb');
        }
    }
    
    return (
       
        <form>
            
            <div className="form-group">
                <label>Enter New Expense Name</label>
                <textarea 
                required
                className="form-control"
                value={name}
                onChange={e => setName(e.target.value)}
                ></textarea>
            </div>
            <div className="form-group">
                <label>Enter amount</label>
                <textarea 
                required
                className="form-control"
                value={amount}
                onChange={e => setAmount(e.target.value)}
                ></textarea>
            </div>
            <div className="form-group">
                <label>Enter  Category ID</label>
                <textarea 
                required
                className="form-control"
                value={category_id}
                onChange={e => setCategory_id(e.target.value)}
                ></textarea>
            </div>
            <div className="form-group">
                <label>Enter Date</label>
                <textarea 
                required
                className="form-control"
                value={date}
                onChange={e => setDate(e.target.value)}
                ></textarea>
            </div>

            <div className="form-group">
                <Button
                type="button"
                className="btn btn-success"
                onClick={makePostRequest}>
                    Add Expense
                 
                </Button>
            </div>
        </form>
       
    );
};
