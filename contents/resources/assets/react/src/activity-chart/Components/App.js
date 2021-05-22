import React, { useState } from 'react';
import AppContext from '../contexts/AppContext';

import DatePickWrapper from './DatePickWrapper';
import ChartWrapper from './ChartWrapper';
import UserList from './UserList';
import GroupBtn from './GroupBtn';
import Table from './Table';

import 'bootstrap/dist/css/bootstrap.min.css';

import axios from "axios";

const App = ({users, endpoint}) => {

    const request = (pattern) => {
        let json;
        switch (pattern) {
            case 1:
                json = '{"status":200,"data":{"point":6042,"user":{"id":44,"name":"孫悟空","email":"goku@mfro.net","chatwork_id":"","department_id":8,"occupation_id":9,"join_date":"202004","birthday":"0101","icon_path":"fyfyijXmLXEu1PCjc2NPRxJDgn31lUxxjDwINf2z.jpg","comment":"","permission":1,"status":1,"stamina":10,"last_login":"2021-04-09","rank":1,"created_at":"2020-06-12 18:05:25","updated_at":"2021-05-15 00:00:02"},"report":{"labels":["2021-03-28~2021-04-03","2021-04-04~2021-04-10","2021-04-11~2021-04-17","2021-04-18~2021-04-24","2021-04-25~2021-05-01","2021-05-02~2021-05-08","2021-05-09~2021-05-15"],"comment":[0,2,0,0,0,0,0],"login":[0,0,0,0,0,0,0],"reaction":[0,47,0,0,0,0,0]}}}';
                break;
            case 2:
                json = '{"status":200,"data":{"point":6042,"user":{"id":44,"name":"孫悟空","email":"goku@mfro.net","chatwork_id":"","department_id":8,"occupation_id":9,"join_date":"202004","birthday":"0101","icon_path":"fyfyijXmLXEu1PCjc2NPRxJDgn31lUxxjDwINf2z.jpg","comment":"","permission":1,"status":1,"stamina":10,"last_login":"2021-04-09","rank":1,"created_at":"2020-06-12 18:05:25","updated_at":"2021-05-15 00:00:02"},"report":{"labels":["2020-12-27~2021-01-02","2021-01-03~2021-01-09","2021-01-10~2021-01-16","2021-01-17~2021-01-23","2021-01-24~2021-01-30","2021-01-31~2021-02-06","2021-02-07~2021-02-13","2021-02-14~2021-02-20","2021-02-21~2021-02-27","2021-02-28~2021-03-06","2021-03-07~2021-03-13","2021-03-14~2021-03-20","2021-03-21~2021-03-27","2021-03-28~2021-04-03","2021-04-04~2021-04-10","2021-04-11~2021-04-17","2021-04-18~2021-04-24","2021-04-25~2021-05-01","2021-05-02~2021-05-08","2021-05-09~2021-05-15"],"comment":[0,0,0,0,0,0,0,0,0,0,0,0,0,0,2,0,0,0,0,0],"login":[0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0],"reaction":[0,0,0,0,0,0,0,0,0,0,0,0,0,0,47,0,0,0,0,0]}}}';
                break;
            case 3:
                json = '{"status":200,"data":{"point":6042,"user":{"id":44,"name":"孫悟空","email":"goku@mfro.net","chatwork_id":"","department_id":8,"occupation_id":9,"join_date":"202004","birthday":"0101","icon_path":"fyfyijXmLXEu1PCjc2NPRxJDgn31lUxxjDwINf2z.jpg","comment":"","permission":1,"status":1,"stamina":10,"last_login":"2021-04-09","rank":1,"created_at":"2020-06-12 18:05:25","updated_at":"2021-05-15 00:00:02"},"report":{"labels":["2020-12","2021-01","2021-02","2021-03","2021-04","2021-05"],"comment":[0,0,0,0,2,0],"login":[0,0,0,0,0,0],"reaction":[0,0,0,0,47,0]}}}';
                break;
            default:
                json = '{"status":200,"data":{"point":2418,"user":{"id":1,"name":"あざトラ","email":"azatora@mfro.net","chatwork_id":"987654321","department_id":1,"occupation_id":1,"join_date":"202004","birthday":"1106","icon_path":"09DNSm3Cm7wfSrj0XGyt0MlKu1eycQY8iS50Qycd.png","comment":"azatora@mfro.net","permission":2,"status":1,"stamina":10,"last_login":"2021-04-09","rank":1,"created_at":"2020-05-27 17:08:18","updated_at":"2021-05-15 00:00:02"},"report":{"labels":["2021-03-28~2021-04-03","2021-04-04~2021-04-10","2021-04-11~2021-04-17","2021-04-18~2021-04-24","2021-04-25~2021-05-01","2021-05-02~2021-05-08","2021-05-09~2021-05-15"],"comment":[1,4,2,0,4,0,0],"login":[0,0,0,0,0,0,0],"reaction":[1,10,5,0,9,0,0]}}}';
        }
        const report = JSON.parse(json).data.report;
        setChartData({
            ...chartData,
            labels: report.labels,
            comments: report.comment,
            logins: report.login,
            reactions: report.reaction
        });
    }

    const [chartData, setChartData] = useState({
        labels: [],
        comments: [],
        logins: [],
        reactions: [],
    });

    return (
        <AppContext.Provider value={{request}}>
            <UserList users={users}/>
            <div className="d-flex justify-content-end">
                <GroupBtn />
                <DatePickWrapper />
            </div>
            <ChartWrapper chartData={chartData}/>
            <Table chartData={chartData}/>
        </AppContext.Provider>
    )
};

export default App;
