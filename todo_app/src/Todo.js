import React, { useState } from "react";
import { List, ListItem, ListItemText, Button, Modal } from "@material-ui/core";
import "./Todo.css";
import db from "./firebase";
import DeleteForeverIcon from "@material-ui/icons/DeleteForever";

function Todo(props) {
  const [input, setInput] = useState(props.todo.todo);
  const [open, setopen] = useState(false);

  const handleClose = () => {
    setopen(false);
  };

  const updateValue = event => {
    event.preventDefault();
    db.collection("todos")
      .doc(props.todo.id)
      .set(
        {
          todo: input
        },
        { merge: true }
      );
    setInput(input);
    setopen(false);
  };

  return (
    <div>
      <Modal open={open} onClose={handleClose}>
        <form>
          <label>Update a Todo</label>
          <input
            placeholder={props.todo.todo}
            value={input}
            onChange={event => setInput(event.target.value)}
          />
          <button onClick={updateValue}>Update</button>
        </form>
      </Modal>
      <List className="todo_list">
        <ListItem>
          <ListItemText primary={props.todo.todo} />
        </ListItem>
        <Button onClick={e => setopen(true)}>Edit</Button>
        <DeleteForeverIcon
          onClick={event =>
            db
              .collection("todos")
              .doc(props.todo.id)
              .delete()
          }
        />
      </List>
    </div>
  );
}

export default Todo;
