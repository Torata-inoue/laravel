import React, { useContext } from "react";
import AppContext from '../contexts/AppContext';
import {PULL_ITEM} from '../actions/lists';

const ListItem = ({item}) => {
    const { state, dispatch, onClickUser, isClose, isPull } = useContext(AppContext);

    const onClick = e => {
        const contents = document.querySelector('.list__contents');

        if (isClose) {
            contents.style.display = 'none';
        }

        const userId = state.filter(user => user.id === parseInt(e.target.closest('li').dataset.id))[0].id
        if (isPull) {
            dispatch({
                type: PULL_ITEM,
                id: userId
            })
        }

        onClickUser(userId);
    }

    return (
        <li className="list__contents--item"　onClick={onClick} data-id={item.id} style={{display: item.display || 'list-item'}}>
            <div className="list__contents--label">
                {/*<img className="list__contents--icon" src={item.icon} alt=""/>*/}
                <span className="list__contents--text">{item.name}</span>
            </div>
        </li>
    )
}

export default ListItem;
