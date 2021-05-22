import React from 'react';
import ReactDOM from 'react-dom';
import App from '../../src/activity-chart/Components/App.js';

const elem = document.getElementById('activity-chart');
const users = JSON.parse(USERS);
const endpoint = '';

ReactDOM.render(<App users={users} endpoint={endpoint}/>, elem)
