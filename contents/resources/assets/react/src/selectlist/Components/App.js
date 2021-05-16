import React, {useReducer} from 'react';
import AppContext from '../contexts/AppContext.js';

import SelectList from './SelectList';
import '../scss/list.scss';
import reducer from '../reducers/lists';

/**
 *
 * @param users
 * @param onClickUser
 * @param isClose
 * @param isPull
 * @returns {JSX.Element}
 * @constructor
 */
const App = ({
        users,
        onClickUser,
        isClose = true,
        isPull = true
    }) => {
    const [state, dispatch] = useReducer(reducer, users);

    return (
        <AppContext.Provider value={{state, dispatch, onClickUser, isClose, isPull}}>
            <SelectList />
        </AppContext.Provider>
    );
}

export default App;
