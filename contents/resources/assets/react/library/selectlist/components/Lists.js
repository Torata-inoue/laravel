import React, {useContext} from 'react';
import AppContext from '../contexts/AppContext';
import List from './List';
import {SUGGEST_ITEMS} from '../actions/lists.js';

const Lists = () => {
    const { state, dispatch } = useContext(AppContext);

    const suggest = e => {
        dispatch({
            type: SUGGEST_ITEMS,
            input: e.target.value
        })
    }

    return (
        <ul className="list__contents">
            <li>
                <div className="list__contents--input-box">
                    <input className="list__contents--input" type="text" placeholder="Search" onChange={suggest} />
                </div>
            </li>
            {
                state.map(item => <List key={item.id} item={item}/>)
            }
        </ul>
    )
}

export default Lists
