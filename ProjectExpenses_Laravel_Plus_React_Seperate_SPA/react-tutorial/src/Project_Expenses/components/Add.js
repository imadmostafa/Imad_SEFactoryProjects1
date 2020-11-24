import axios from 'axios';
import React, {useState} from 'react';
import {useHistory} from 'react-router-dom';
import { Button } from 'reactstrap';
import  { Redirect } from 'react-router-dom'



export default function Add() {
    const history = useHistory();
    const [loading, setLoading] = useState(false);
    const [category_name, setTitle] = useState('');
    const [description, setDescription] = useState('');

    var isloggedin=localStorage.getItem('isloggedin');
    if(isloggedin!="true"){
        history.push('/login');
        
       
      }
    async function makePostRequest() {

        const Datato_Send = {
            
            name: description,
           
          }
         let token = localStorage.getItem('token');
         axios.defaults.headers.common['Authorization'] =  'Bearer '+token;
        let res = await axios.post('http://localhost:8000/api/addCategroy', Datato_Send);
       

        console.log(res.data);
        if(res.data.data=='Post created!'){
        alert('category added');
        history.push('/home');//this will redirect you to home page ;
        }
        else{
            alert('erj3 jarreb hbb');
        }
       
    }
    
    return (
       
        <form>
            
            <div className="form-group">
                <label>Enter New Category Name</label>
                <textarea 
                required
                className="form-control"
                value={description}
                onChange={e => setDescription(e.target.value)}
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
