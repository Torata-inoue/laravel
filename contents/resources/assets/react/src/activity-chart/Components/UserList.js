import React, {useContext, useEffect, useState} from 'react';
import AppContext from '../contexts/AppContext';

import App from '../../selectlist/Components/App';
import useEffectCustom from '../hooks/useEffectCustom';

const UserList = ({users}) => {
    const { request } = useContext(AppContext);
    const [selectedUserId, setSelectedUserId] = useState(1);

    useEffectCustom(() => request(1), [selectedUserId]);

    return (
        <App
            users={users}
            onClickUser={userId => setSelectedUserId(userId)}
        />
    );
};

export default UserList;
