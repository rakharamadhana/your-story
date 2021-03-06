import React, { useEffect, useState, useRef } from "react";
import ReactDOM from "react-dom";
import Excalidraw, {
    exportToCanvas,
    exportToSvg,
    exportToBlob
} from "@excalidraw/excalidraw";
import InitialData from "./initialData";
import "./styles.scss";

export default function Draw() {
    const excalidrawRef = useRef(null);

    const [viewModeEnabled, setViewModeEnabled] = useState(false);
    const [zenModeEnabled, setZenModeEnabled] = useState(false);
    const [gridModeEnabled, setGridModeEnabled] = useState(false);
    const [blobUrl, setBlobUrl] = useState(null);
    const [canvasUrl, setCanvasUrl] = useState(null);
    const [exportWithDarkMode, setExportWithDarkMode] = useState(false);
    const [shouldAddWatermark, setShouldAddWatermark] = useState(false);
    const [theme, setTheme] = useState("light");

    useEffect(() => {
        const onHashChange = () => {
            const hash = new URLSearchParams(window.location.hash.slice(1));
            const libraryUrl = hash.get("addLibrary");
            if (libraryUrl) {
                excalidrawRef.current.importLibrary(libraryUrl, hash.get("token"));
            }
        };
        window.addEventListener("hashchange", onHashChange, false);
        return () => {
            window.removeEventListener("hashchange", onHashChange);
        };
    }, []);

    const updateScene = () => {
        const sceneData = {
            elements: [
                {
                    type: "rectangle",
                    version: 141,
                    versionNonce: 361174001,
                    isDeleted: false,
                    id: "oDVXy8D6rom3H1-LLH2-f",
                    fillStyle: "hachure",
                    strokeWidth: 1,
                    strokeStyle: "solid",
                    roughness: 1,
                    opacity: 100,
                    angle: 0,
                    x: 100.50390625,
                    y: 93.67578125,
                    strokeColor: "#c92a2a",
                    backgroundColor: "transparent",
                    width: 186.47265625,
                    height: 141.9765625,
                    seed: 1968410350,
                    groupIds: []
                }
            ],
            appState: {
                viewBackgroundColor: "#edf2ff"
            }
        };
        excalidrawRef.current.updateScene(sceneData);
    };

    return (
        <div className="App">
                <div className="excalidraw-wrapper">
                    <Excalidraw
                        ref={excalidrawRef}
                        initialData={InitialData}
                        onChange={(elements, state) =>
                            console.log("Elements :", elements, "State : ", state)
                        }
                        onPointerUpdate={(payload) => console.log(payload)}
                        onCollabButtonClick={() =>
                            window.alert("You clicked on collab button")
                        }
                        viewModeEnabled={viewModeEnabled}
                        zenModeEnabled={zenModeEnabled}
                        gridModeEnabled={gridModeEnabled}
                        theme={theme}
                        name="Custom name of drawing"
                        UIOptions={{ canvasActions: { loadScene: false } }}
                    />
                </div>
        </div>
    );
}

const excalidrawWrapper = document.getElementById("draw");

ReactDOM.render(React.createElement(Draw), excalidrawWrapper);
