import React, {useState, useEffect} from 'react';
import {useHistory, useParams} from 'react-router-dom';
import { Button } from 'reactstrap';
import axios from 'axios';


export default function Edit() {
    const { id } = useParams();
    const history = useHistory();
   
    const [title, setTitle] = useState('');
    const [description, setDescription] = useState('');

    const onEditSubmit = async () => {
       
        try {
          var send_url_index="http://localhost:8000/api/getExpense/"+id;
          axios.get(send_url_index).updatePost({
                title, description,
            }, id);
            history.push('/home');
        }catch {
            alert('Failed to Edit Post');
        } finally {
           
        }
    };

    useEffect(() => {//get the expense we want ;
      var send_url_index="http://localhost:8000/api/getExpense/"+id;
      axios.get(send_url_index).then(res => {
            const post = res.data;

            setTitle(post.data.title);
            setDescription(post.data.description);
        })
    }, []);

    return (
        
        <form>
            <div className="form-group">
                <label>name</label>
                <input 
                className="form-control" 
                type="text"
                value={title}
                onChange={e => setTitle(e.target.value)}/>
            </div>
            <div className="form-group">
                <label>Description</label>
                <textarea 
                className="form-control"
                value={description}
                onChange={e => setDescription(e.target.value)}
                ></textarea>
            </div>
            <div className="form-group">
                <Button
                
                
                onClick={onEditSubmit}>
                    
                </Button>
            </div>
        </form>
       
    );
};
