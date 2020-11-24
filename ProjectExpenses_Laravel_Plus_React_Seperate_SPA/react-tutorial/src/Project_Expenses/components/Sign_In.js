
import { Col, Row, Button, Form, FormGroup, Label, Input } from 'reactstrap';
import axios from 'axios';
import React, {useState,ReactDOM} from 'react';
import {useHistory} from 'react-router-dom';
import Initial from '../Router/Main_Router';




const Sign_in = (props) => {
    
    const history = useHistory();
   
    const [email, setEmail] = useState('');
    const [password, setPassword] = useState('');

    async function makePostRequest() {

        const Datato_Send = {
            
            email: email,
            password:password
           
          }
    
        let res = await axios.post('http://localhost:8000/api/login', Datato_Send);
    
        console.log(res.data);
        if(res.data!=null){
            console.log('logedin');
        localStorage.setItem('isloggedin',true);
        localStorage.setItem('user_id',res.data.user.id);
        localStorage.setItem('user_name',res.data.user.name);
        localStorage.setItem('token',res.data.access_token);
        console.log('user_id',res.data.user.id);
       
        history.push('/home');//this will redirect you to home page ;
        }else{
            alert("login failed");
        }
        
       
    }

  return (
    <Form>
      <Row form>
        <Col md={6}>
          <FormGroup>
            <Label for="exampleEmail">Email</Label>
            <Input type="email" name="email" id="exampleEmail" placeholder="Enter Email" 
            value={email}
            onChange={e => setEmail(e.target.value)}
            />
          </FormGroup>
        </Col>
        <Col md={6}>
          <FormGroup>
            <Label for="examplePassword">Password</Label>
            <Input type="password" name="password" id="examplePassword" placeholder="Enter Password" 
            value={password}
            onChange={e => setPassword(e.target.value)}
            />
          </FormGroup>
        </Col>
      </Row>
     
    
      <Button onClick={makePostRequest}>Sign in</Button>
    </Form>
  );
}

export default Sign_in;