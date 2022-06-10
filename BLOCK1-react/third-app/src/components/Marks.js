import PassDetect from "./PassDetect";

function CourseDisplay(props){
    return <li>Course name : {props.course.courseName} grade : {props.course.grade}</li>;
}

function Marks(props){
    let sum = 0; 
    let counter = 0;
    let min = 100;
    let max = 0;

    props.courses.map(
        (course) =>{
            counter++;
            sum += course.grade;

            if(min > course.grade){
                min = course.grade;
            }
            if(max < course.grade){
                max = course.grade;
            }
        }
    )
    return(
        <>
            <ul>
                {props.courses.map( (course)=> <CourseDisplay key = {course.courseID}
                course={course}/>)}
            </ul>            
            <h2>Your average is {sum / counter} </h2>
            <h3>Min Grade is {min}</h3>
            <h3>Max Grade is {max}</h3>
            
            <PassDetect mark= {sum / counter} />
        </>
    )
}
export default Marks;