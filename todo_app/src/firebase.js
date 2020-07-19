import firebase from "firebase";
const firebaseApp = firebase.initializeApp({
 // Add you configuration code here
});

const db = firebaseApp.firestore();
export default db;
